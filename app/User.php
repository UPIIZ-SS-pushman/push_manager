<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin_messages(){
      return $this->hasMany(AdminMessage::class);
    }

    public function notification_log(){
      return $this->hasMany(NotificationLog::class);
    }

    public function user_type(){
      return $this->belongsTo(UserType::class);
    }

    public function sector(){
      return $this->belongsTo(Sector::class);
    }

    public function individual_selects(){
      return $this->hasMany(IndividualSelect::class);
    }

    public function __toString(){
      return $this->surname.' '.$this->lastname;
    }
}
