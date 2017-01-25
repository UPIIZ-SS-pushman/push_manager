<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Sector;

class UserController extends Controller
{
    public function sectors(){
        $user = User::first();
        $sector = Sector::all();
    
        return view('user', ['users' => $user, 'sectors' => $sector]);
    }
}
