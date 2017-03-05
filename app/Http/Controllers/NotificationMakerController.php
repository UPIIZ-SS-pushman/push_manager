<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use App\Http\Requests;
use App\User;
use App\IndividualSelect;
use App\SectorSelect;
use App\NotificationMaker;
use App\Notification;
use App\NotificationLog;
use App\NotificationIndividual;
use App\NotificationSector;
use Illuminate\Support\Facades\Auth;

class NotificationMakerController extends Controller
{
    private function getMakerByUser(){
      $user = Auth::user();
      $maker = NotificationMaker::firstOrCreate(['user_id' => $user->id]);
      //$request->session()->put('maker', $maker);
      return $maker;
    }

    public function getMaker(Request $request){
      $step = 1;
      $maker = $this->getMakerByUser();
      if($maker->step != null){
        $step = $maker->step;
      }
      return redirect()->action('NotificationMakerController@getMakerStep', ['step' => $step]);
    }

    public function getMakerStep(Request $request, $step){
      $maker = $this->getMakerByUser();
      switch($step){
        case 1:
          return view('notification.notification', ['maker' => $maker]);
          break;
        case 2:
          if($maker->title!=null && $maker->body!=null){
            return view('notification.notification2', ['maker' => $maker]);
          }else{
            return redirect('notificationmaker/1');
          }
          break;
        case 3:
          if(!($maker->individual_selects->isEmpty() && $maker->sector_selects->isEmpty()) ){
            return view('notification.notification3', ['maker' => $maker]);
          }else{
            return redirect('notificationmaker/2');
          }
          break;
        case 4:
          if($maker->send_date!=null && $maker->send_time!=null){
            return view('notification.notification4', ['maker' => $maker]);
          }else{
            return redirect('notificationmaker/3');
          }
          break;
        default:
          abort(400, "Error: No such step");
      }
    }

    public function postMakerData(Request $request, $step){
      $maker = $this->getMakerByUser();
      switch($step){
        case 1:
          $this->validate($request,[
            'title' => 'required|min:2|max:50',
            'body' => 'required|min:2|max:255',
          ]);
          $maker->step = 2;
          $maker->update($request->only('title', 'body'));
          return redirect()->action('NotificationMakerController@getMakerStep', ['step' => 2]);
          break;
        case 2:
          $this->validate($request,[
            'individuos' => 'required_without_all:grupos',
            'grupos' => 'required_without_all:individuos',
          ]);

          foreach($maker->individual_selects as $ind){
            $ind->delete();
          }
          foreach($maker->sector_selects as $sec){
            $sec->delete();
          }

          if($request->input('individuos') != null){
            foreach ($request->input('individuos') as $ind) {
              $isel = IndividualSelect::create(['user_id'=>$ind, 'notification_maker_id'=>$maker->id]);
            }
          }
          if($request->input('grupos') != null){
            foreach ($request->input('grupos') as $grp) {
              $grp = SectorSelect::create(['sector_id'=>$grp, 'notification_maker_id'=>$maker->id]);
            }
          }
          $maker->step = 3;
          $maker->update(array('step'));
          return redirect()->action('NotificationMakerController@getMakerStep', ['step' => 3]);
          break;
        case 3:
          $this->validate($request,[
            'time' => 'required|date_format:H:i',
            'date' => 'required|date_format:d/m/Y',
          ]);
          $maker->step = 4;

          //convert time to UTC before storing
          $time = Carbon::createFromFormat('d/m/Y H:i', $request->input('date').' '.$request->input('time'), 'America/Mexico_City');
          $time->setTimezone('UTC');

          if($time->lt(Carbon::now('UTC'))){
            return redirect('/notificationmaker/3')->withErrors("La fecha no puede ser anterior a este momento.");
          }

          $maker->update([
            'send_date' => $time->format('Y-m-d'),
            'send_time' => $time->format('H:i'),
          ]);
          //echo $maker;
          return redirect()->action('NotificationMakerController@getMakerStep', ['step' => 4]);
          break;
        case 4:
          $this->validate($request,[
            'title' => 'required|min:2|max:50',
            'body' => 'required|min:2|max:255',
            'send_time' => 'required|date_format:H:i',
            'send_date' => 'required|date_format:d/m/Y'
          ]);
          $individuals = $maker->getSelectedIndividuals();
          $sectors = $maker->getSelectedSectors();

          if(empty($individuals) && empty($sectors)){
            return redirect('/notificationmaker/2')->withErrors("Selecciona a los destinatarios.");
          }

          $time = \Carbon\Carbon::parse($maker->send_date.' '.$maker->send_time);
          if($time->lt(Carbon::now('UTC'))){
            return redirect('/notificationmaker/3')->withErrors("Por favor cambia la fecha para que sea después de este momento.");
          }

          $this->storeScheduleNotification($maker);
          return view('notification.notification5');
          break;
        default:
          abort(400, "Error: No such step");
        break;
      }

    }

    private function storeScheduleNotification(NotificationMaker $maker){
      $notification = new Notification;
      $notification->title = $maker->title;
      $notification->body = $maker->body;

      $time = \Carbon\Carbon::parse($maker->send_date.' '.$maker->send_time);
      $notification->sent = $time;
      $notification->save();

      $notificationlog = new NotificationLog;
      $notificationlog->notification_id = $notification->id;
      $notificationlog->user_id = $maker->user_id;
      $notificationlog->status = 0;
      $notificationlog->save();

      //$notification->notification_log()->save($notificationlog);
      $notification->notification_log_id = $notificationlog->id;
      $notification->save();

      foreach($maker->individual_selects as $i){
        $ni = new NotificationIndividual;
        $ni->user_id = $i->user_id;
        $ni->notification_id = $notification->id;
        $ni->save();
      }

      foreach($maker->sector_selects as $s){
        $ns = new NotificationSector;
        $ns->sector_id = $s->sector_id;
        $ns->notification_id = $notification->id;
        $ns->save();
      }

      $maker->delete();
    }
}
