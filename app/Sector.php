<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{

  protected $fillable = ['name', 'user_type_id'];

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
