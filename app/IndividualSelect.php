<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndividualSelect extends Model
{
  public function notification_maker(){
    return $this->belongsTo(NotificationMaker::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
