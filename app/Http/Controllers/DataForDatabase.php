<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sector;
use App\UserType;
use App\User;
use App\Notification;
use App\NotificationLog;
use Carbon\Carbon;

class DataForDatabase extends Controller
{
    public function generateData(){
      $sector = new Sector;
      $sector->name = "Ingeniería en Sistemas Computacionales";
      $sector->save();

      $userType = new UserType;
      $userType->name = "Estudiante";
      $userType->save();

      $user = new User;
      $user->username = "rmontes1";
      $user->surname = "Ricardo";
      $user->lastname = "Montes";
      $user->email = "ricardo@mail.com";
      $user->user_type_id = 1;
      $user->sector_id = 1;
      $user->password = bcrypt('1234');
      $user->save();
    }

    public function createNotif(){
      $notification = new Notification;
      $notification->title = "Test message";
      $notification->body = "This is a test message\nJust testing ;)";
      $notification->sent = Carbon::now();
      $notification->destination = "all";
      $notification->sector_id = 1;
      $notification->save();

      $notificationlog = new NotificationLog;
      $notificationlog->notification_id = $notification->id;
      $notificationlog->user_id = User::first()->id;
      $notificationlog->status = 0;
      //$notificationlog->save();

      $notification->notification_log()->save($notificationlog);
      //$notification->save();
      echo $notification->notification_log;
    }
}
