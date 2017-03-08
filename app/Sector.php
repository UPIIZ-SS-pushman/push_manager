<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{

  protected $fillable = ['name'];

  public function users(){
    return $this->hasMany(User::class);
  }

  public function __toString(){
    return $this->name;
  }

  public function user_type(){
    return $this->belongsTo(UserType::class);
  }
}
