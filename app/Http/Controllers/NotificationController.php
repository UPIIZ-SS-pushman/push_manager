<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notification;
use App\NotificationSector;
use App\NotificationIndividual;
use Carbon\Carbon;

/*https://github.com/brozot/Laravel-FCM/blob/master/doc/Readme.md */
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class NotificationController extends Controller
{
    public function viewNotification(Request $request, $id){
      //echo $id;
      $notification = Notification::findOrFail($id);
      // echo $notification;
      return view('notification.editnotification', ['notification' => $notification, 'editable' => 'readonly', 'enabled' => 'disabled']);
    }

    public function editNotification(Request $request, $id){
      //echo $id;
      $notification = Notification::findOrFail($id);
      // echo $notification;
      return view('notification.editnotification', ['notification' => $notification, 'editable' => '', 'enabled' => '']);
    }

    public function updateNotification(Request $request, $id){
      //echo $id;
      $notification = Notification::findOrFail($id);
      $this->validate($request,[
        'title' => 'required|min:2|max:50',
        'body' => 'required|min:2|max:255',
        'send_time' => 'required|date_format:H:i',
        'send_date' => 'required|date_format:d/m/Y',
        'individuos' => 'required_without_all:grupos',
        'grupos' => 'required_without_all:individuos',
      ]);

      foreach($notification->notification_individuals as $ind){
        $ind->delete();
      }
      foreach($notification->notification_sectors as $sec){
        $sec->delete();
      }

      if($request->input('individuos') != null){
        foreach ($request->input('individuos') as $ind) {
          $isel = NotificationIndividual::create(['user_id'=>$ind, 'notification_id'=>$notification->id]);
        }
      }
      if($request->input('grupos') != null){
        foreach ($request->input('grupos') as $grp) {
          $grp = NotificationSector::create(['sector_id'=>$grp, 'notification_id'=>$notification->id]);
        }
      }

      $time = Carbon::createFromFormat('d/m/Y H:i', $request->input('send_date').' '.$request->input('send_time'), 'America/Mexico_City');
      $time->setTimezone('UTC');
      if($time->lt(Carbon::now('UTC'))){
        return redirect('notification/view/'.$notification->id)->withErrors("Por favor cambia la fecha para que sea después de este momento.");
      }

      $notification->update([
        'title' => $request->input('title'),
        'body' => $request->input('body'),
        'sent' => $time
      ]);
      return view('notification.notification5');
    }

    public function sendTestNotif(){
      $optionBuiler = new OptionsBuilder();
      $optionBuiler->setTimeToLive(60*20);

      $notificationBuilder = new PayloadNotificationBuilder('Push manager');
      $notificationBuilder->setBody('test message')
                          ->setSound('default')
                          ->setTag('notification');

      $dataBuilder = new PayloadDataBuilder();
      $dataBuilder->addData(['a_data' => 'my_data']);

      $option = $optionBuiler->build();
      $notification = $notificationBuilder->build();
      $data = $dataBuilder->build();

      $token = "e62zTpRIvJs:APA91bHEWPKWkQ3jMsmhrmlO4DR0aD8CxkI1cl1I4FsTFFE7-OkXLge10qYvLX0gR4u9LjBGlczTG2SJmVTl8tbFenmkM7X9pCWO4KFvXGU7w9ckg4oIGjMelrU3culg2JXcRFG_k3ng";

      $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

      // $downstreamResponse->numberSuccess();
      // $downstreamResponse->numberFailure();
      // $downstreamResponse->numberModification();

      //return Array - you must remove all this tokens in your database
      $downstreamResponse->tokensToDelete();

      //return Array (key : oldToken, value : new token - you must change the token in your database )
      $downstreamResponse->tokensToModify();

      //return Array - you should try to resend the message to the tokens in the array
      $downstreamResponse->tokensToRetry();

      $dataresponse = array(
        'delete' => $downstreamResponse->tokensToDelete(),
        'changed' => $downstreamResponse->tokensToModify(),
        'retry' => $downstreamResponse->tokensToRetry()
      );
      //return Array (key:token, value:errror) //in production you should remove from your database the tokens
      return response()->json($dataresponse);
    }
}
