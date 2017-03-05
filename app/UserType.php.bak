<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public function users(){
      return $this->hasMany(User::class);
    }

    public function __toString(){
      return $this->name;
    }
}
