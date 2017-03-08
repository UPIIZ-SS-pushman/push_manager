<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = ['name'];

    public function users(){
      return $this->hasMany(User::class);
    }

    public function __toString(){
      return $this->name;
    }

    public function sectors(){
      return $this->hasMany(Sector::class);
    }
}
