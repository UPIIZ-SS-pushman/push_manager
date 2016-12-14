<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationLog extends Model
{
  public function notification(){
    return $this->belongsTo(Notification::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
