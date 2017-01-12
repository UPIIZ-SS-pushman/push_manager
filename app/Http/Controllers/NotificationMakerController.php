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

class NotificationMakerController extends Controller
{
    private function getMakerByUser(){
      /*TODO
        change this line to get the real user
      */
      $user = User::first();
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
          return view('notification.notification2', ['maker' => $maker]);
          break;
        case 3:
          return view('notification.notification3', ['maker' => $maker]);
          break;
        case 4:
          // echo $request->session()->get('maker', function() {
          //     return redirect()->action('NotificationMakerController@getMaker');
          // });
          echo $maker;
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
            'date' => 'required|date_format:d/m/Y|after:yesterday',
          ]);
          $maker->step = 4;

          //convert time to UTC before storing
          $time = Carbon::createFromFormat('d/m/Y H:i', $request->input('date').' '.$request->input('time'), 'America/Mexico_City');
          $time->setTimezone('UTC');

          $maker->update([
            'send_date' => $time->format('Y-m-d'),
            'send_time' => $time->format('H:i'),
          ]);
          //echo $maker;
          return redirect()->action('NotificationMakerController@getMakerStep', ['step' => 4]);
          break;
        default:
          abort(400, "Error: No such step");
        break;
      }

    }
}
