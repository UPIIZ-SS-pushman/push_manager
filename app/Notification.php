<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function notification_log(){
      return $this->hasOne(NotificationLog::class);
    }

    public function notification_individuals(){
      return $this->hasMany(NotificationIndividual::class);
    }

    public function notification_sectors(){
      return $this->hasMany(NotificationSector::class);
    }
}
