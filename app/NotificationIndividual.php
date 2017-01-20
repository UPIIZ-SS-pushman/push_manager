<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationIndividual extends Model
{
  protected $fillable = ['user_id', 'notification_id'];
  public function notification(){
    return $this->belongsTo(Notification::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
