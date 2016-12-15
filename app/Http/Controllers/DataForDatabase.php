<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sector;
use App\UserType;
use App\User;
use App\Notification;
use App\NotificationIndividual;
use App\NotificationSector;
use App\NotificationLog;
use Carbon\Carbon;

class DataForDatabase extends Controller
{
    public function generateData(){
      $sector = new Sector;
      $sector->name = "Ingeniería en Sistemas Computacionales";
      $sector->save();

      $sector = new Sector;
      $sector->name = "Ingeniería en Mecatrónica";
      $sector->save();

      $userType = new UserType;
      $userType->name = "Administrador";
      $userType->save();

      $userType = new UserType;
      $userType->name = "Estudiante";
      $userType->save();

      $userType = new UserType;
      $userType->name = "Maestro";
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

      $user = new User;
      $user->username = "jlujan1";
      $user->surname = "Juan";
      $user->lastname = "Luján";
      $user->email = "juan@mail.com";
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
      //$notification->destination = "all";
      //$notification->sector_id = 1;
      $notification->save();

      $notificationind = new NotificationIndividual;
      $notificationind->user_id = 1;
      $notificationind->notification_id = $notification->id;
      $notificationind->save();

      $notificationsec = new NotificationSector;
      $notificationsec->sector_id = 1;
      $notificationsec->notification_id = $notification->id;
      $notificationsec->save();

      $notificationsec = new NotificationSector;
      $notificationsec->sector_id = 2;
      $notificationsec->notification_id = $notification->id;
      $notificationsec->save();

      $notificationlog = new NotificationLog;
      $notificationlog->notification_id = $notification->id;
      $notificationlog->user_id = User::first()->id;
      $notificationlog->status = 0;
      //$notificationlog->save();

      $notification->notification_log()->save($notificationlog);
      //$notification->save();
      echo $notification->notification_log;
    }

    public function createNotifMaker(){

    }
}
