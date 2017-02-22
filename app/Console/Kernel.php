<?php

namespace App\Console;
use App\Notification;
use Carbon\Carbon;
use App\NotificationIndividual;
use App\NotificationSector;
use App\NotificationLog;
use App\User;
use App\NotificationSenderClass;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

use Log;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
          $pendingNotifs = Notification::whereBetween('sent', [Carbon::now()->subMinutes(2), Carbon::now()])->get();//get notifications from the last two minutes
          foreach($pendingNotifs as $not){
            if($not->notification_log->status == 0){//if notification hasn't been sent
              //send notification and update status
              $status = NotificationSenderClass::sendNotification($not);
              if($status == 0){
                $not->notification_log->status = 1;//notification sent
              }else if(is_array($status)){//check tokens to retry
                Log::warning("Couldn't send notification to some users: ".var_dump($status));
                $not->notification_log->status = 1;//notification sent
              }else{//notification not sent
                $not->notification_log->status = -1;//couldn't send notification
              }
              $not->notification_log->save();
            }
          }
        })->everyMinute();

        $schedule->call(function () {
          $pendingNotifs = Notification::whereBetween('sent', Carbon::now()->subDay(), Carbon::now()->subHour())->get();//get notifications programed between yesterday and last hour
          foreach($pendingNotifs as $not){
            if($not->notification_log->status == 0){//if notification hasn't been sent
              $not->notification_log->status = -1;//mark notifiction as not sent since its time passed
              $not->notification_log->save();
            }
          }
        })->daily();
    }
}
