<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserType;
use App\Sector;

class MobileSessionController extends Controller
{
    public function fetchUserTypes(){
      return ['result'=>UserType::where('id', '<>', 1)->get(['id', 'name as description'])];
    }

    public function fetchSectors($user_type){
      return ['result'=>Sector::where('user_type_id', $user_type)->get(['id', 'name as description'])];
    }
}
