<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationSector extends Model
{
  protected $fillable = ['sector_id', 'notification_id'];
  public function notification(){
    return $this->belongsTo(Notification::class);
  }

  public function sector(){
    return $this->belongsTo(Sector::class);
  }
}
