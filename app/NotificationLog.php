<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationLog extends Model
{
  public function notification(){
    return $this->hasOne(Notification::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
