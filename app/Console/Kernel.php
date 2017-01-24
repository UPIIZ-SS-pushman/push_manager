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
          $pendingNotifs = Notification::whereBetween('sent', [Carbon::now()->subMinutes(2), Carbon::now()])->get();
          foreach($pendingNotifs as $not){
            if($not->notification_log->status == 0){//if notification hasn't been sent
              //send notification and update status
              if(NotificationSenderClass::sendNotification($not) == 0){
                $not->notification_log->status = 1;
              }else{
                $not->notification_log->status = -1;
              }
              $not->notification_log->save();
            }
          }
        })->everyMinute();

        $schedule->call(function () {
          $pendingNotifs = Notification::whereDate('sent', '<', Carbon::now()->subHour())->get();
          foreach($pendingNotifs as $not){
            if($not->notification_log->status == 0){//if notification hasn't been sent
              $not->notification_log->status = -1;
              $not->notification_log->save();
            }
          }
        })->daily();
    }
}
