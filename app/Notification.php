<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $fillable = ['title', 'body', 'sent'];
    public function notification_log(){
      return $this->hasOne(NotificationLog::class);
    }

    public function notification_individuals(){
      return $this->hasMany(NotificationIndividual::class);
    }

    public function notification_sectors(){
      return $this->hasMany(NotificationSector::class);
    }

    public function __toString(){
      return $this->title;
    }

    public function getSelectedIndividuals(){
      return $this->notification_individuals->lists('user_id')->toArray();
    }

    public function getSelectedSectors(){
      return $this->notification_sectors->lists('sector_id')->toArray();
    }
}
