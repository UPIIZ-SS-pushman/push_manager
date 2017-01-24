<?php
namespace App;

use Carbon\Carbon;
use App\Notification;
use App\User;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Exception;

class NotificationSenderClass
{
    public static function sendNotification(Notification $notif){
      $optionBuiler = new OptionsBuilder();
      $optionBuiler->setTimeToLive(60*20);

      $notificationBuilder = new PayloadNotificationBuilder($notif->title);
      $notificationBuilder->setBody($notif->body)
                          ->setSound('default')
                          ->setTag('notification');

      // $dataBuilder = new PayloadDataBuilder();
      // $dataBuilder->addData(['a_data' => 'my_data']);

      $option = $optionBuiler->build();
      $notification = $notificationBuilder->build();
      // $data = $dataBuilder->build();

      //replace to send to desired users
      //$token = "e62zTpRIvJs:APA91bHEWPKWkQ3jMsmhrmlO4DR0aD8CxkI1cl1I4FsTFFE7-OkXLge10qYvLX0gR4u9LjBGlczTG2SJmVTl8tbFenmkM7X9pCWO4KFvXGU7w9ckg4oIGjMelrU3culg2JXcRFG_k3ng";
      $notinds = $notif->notification_individuals;
      $tokens = array();

      $i = 0;
      foreach($notinds as $ni){
        if($ni->user->firebase_key != null){
          $tokens[$i] = $ni->user->firebase_key;
          $i++;
        }
      }

      if(!empty($tokens)){
        $downstreamResponse = FCM::sendTo($tokens, $option, $notification);
        NotificationSenderClass::updateDBtokens($downstreamResponse);
        return 0;
      }
      return 1;
    }

    private static function updateDBtokens($downstreamResponse){
      //return Array - you must remove all this tokens in your database
      foreach($downstreamResponse->tokensToDelete() as $deltok){
        $u = User::where('firebase_key', $deltok)->first();
        $u->firebase_key = null;
        $u->save();
      }

      //return Array (key : oldToken, value : new token - you must change the token in your database )
      $downstreamResponse->tokensToModify();
      foreach($downstreamResponse->tokensToModify() as $oldtok=>$newtok){
        $u = User::where('firebase_key', $oldtok)->first();
        $u->firebase_key = $newtok;
        $u->save();
      }

      //return Array - you should try to resend the message to the tokens in the array
      $downstreamResponse->tokensToRetry();
    }
}
?>
