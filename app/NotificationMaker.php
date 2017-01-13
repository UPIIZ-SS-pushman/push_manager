<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationMaker extends Model
{
  protected $fillable = ['user_id', 'title', 'body', 'send_date', 'send_time', 'step'];


  public function individual_selects(){
    return $this->hasMany(IndividualSelect::class);
  }

  public function getSelectedIndividuals(){
    return $this->individual_selects->lists('user_id')->toArray();
  }

  public function sector_selects(){
    return $this->hasMany(SectorSelect::class);
  }

  public function getSelectedSectors(){
    return $this->sector_selects->lists('sector_id')->toArray();
  }

}
