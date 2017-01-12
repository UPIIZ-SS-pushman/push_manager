<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualSelect extends Model
{
  protected $fillable = ['user_id', 'notification_maker_id'];

  public function notification_maker(){
    return $this->belongsTo(NotificationMaker::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
