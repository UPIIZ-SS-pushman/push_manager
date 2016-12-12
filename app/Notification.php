<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function notification_log(){
      return $this->hasOne(NotificationLog::class);
    }
}
