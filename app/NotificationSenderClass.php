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
use LaravelFCM\Message\Topics;

use Log;

class NotificationSenderClass
{
    public static function sendNotification(Notification $notif){
      $optionBuiler = new OptionsBuilder();
      $optionBuiler->setTimeToLive(60*20);

      $notificationBuilder = new PayloadNotificationBuilder($notif->title);
      $notificationBuilder->setBody($notif->body)
                          ->setSound('default')
                          ->setTag('notification');


      $option = $optionBuiler->build();
      $notification = $notificationBuilder->build();
      $notinds = $notif->notification_individuals;
      $notsect = $notif->notification_sectors;

      $tokens = array();
      $sectors = array();

      foreach($notinds as $ni){
        if($ni->user->firebase_key != null){
          $tokens[] = $ni->user->firebase_key;
        }else{
          Log::warning('User with id '.$ni->user->id.' doesn\'t have a valid firebase key');
        }
      }

      $retval = 1;
      foreach($notsect as $ns){
        $sect = $ns->sector->name;
        $sect = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $sect);
        $sect = str_replace(' ', '', $sect);
        $sect = str_replace("'", "", $sect);
        $sectors[] = $sect;
      }
      if(!empty($sectors)){//send notification to topics (sectors)
        for($i = 0; $i < count($sectors); $i++){
          $topic = new Topics();
          $topic->topic($sectors[$i]);

          $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
          if($topicResponse->error()){
            Log::warning("Couldn't send notification to sectors");
          }else{
            $retval = 0;
          }
          $topic = null;
        }
      }

      $individualResponse = -1;
      if(!empty($tokens)){//send notifications to individuals
        $downstreamResponse = FCM::sendTo($tokens, $option, $notification);
        return NotificationSenderClass::updateDBtokens($downstreamResponse);//return status
      }
      return $retval;
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
      if(!empty($downstreamResponse->tokensToRetry())){
        return $downstreamResponse->tokensToRetry();//array with tokens to resend
      }else{
        return 0;//no errors
      }

    }
}
?>
