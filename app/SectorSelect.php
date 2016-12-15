<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorSelect extends Model
{
  public function notification_maker(){
    return $this->belongsTo(NotificationMaker::class);
  }

  public function sector(){
    return $this->belongsTo(Sector::class);
  }
}
