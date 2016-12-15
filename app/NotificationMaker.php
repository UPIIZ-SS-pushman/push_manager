<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationMaker extends Model
{
  protected $fillable = ['user_id', 'title', 'body', 'send_date', 'send_time'];


  public function individual_selects(){
    return $this->hasMany(IndividualSelect::class);
  }

  public function sector_selects(){
    return $this->hasMany(SectorSelect::class);
  }
}
