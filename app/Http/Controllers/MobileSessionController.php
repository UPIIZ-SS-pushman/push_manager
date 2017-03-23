<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserType;
use App\Sector;
use App\User;
use Log;
use Validator;
use Auth;


class MobileSessionController extends Controller
{
    public function fetchUserTypes(){
      return ['result'=>UserType::where('id', '<>', 1)->get(['id', 'name as description'])];
    }

    public function fetchSectors($user_type){
      return ['result'=>Sector::where('user_type_id', $user_type)->get(['id', 'name as description']), "csrf"=>csrf_token()];
    }

    public function registerUser(Request $request){
      Log::info("Registering user");
      $validator = Validator::make($request->all(),[
        'username' => 'bail|required|min:3|max:15|unique:users,username',
        'password' => 'bail|required|min:3|max:15',
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required|min:3|max:25|email|unique:users,email',
        'sector' => 'required',
        'usertype' => 'required',
      ]);

      if ($validator->fails()) {
        return [
          "status"=>"err",
          "messages"=>($validator->messages()->all()),
        ];
      }

      $user = new User;
      $user->username = $request->input('username');
      $user->password = bcrypt($request->input('password'));
      $user->name = $request->input('name');
      $user->lastname = $request->input('lastname');
      $user->email = $request->input('email');
      $user->firebase_key = $request->input('token');
      $user->sector_id = $request->input('sector');
      $user->user_type_id = $request->input('usertype');
      $user->save();

      return [
        "status"=>"ok",
      ];
    }

    public function mobileLogin(Request $request){
      $validator = Validator::make($request->all(),[
        'username' => 'required|min:3|max:15',
        'password' => 'required|min:3|max:15',
      ]);

      if ($validator->fails()) {
        return [
          "status"=>"err",
          "messages"=>($validator->messages()->all()),
        ];
      }

      $credentials = $request->only('username', 'password');
      $firebasetoken = $request->input('token');
      $user = null;

      if(Auth::once($credentials)){
        $user = Auth::getUser();
        if($firebasetoken != null && $firebasetoken != $user->firebase_key){
          $user->firebase_key = $firebasetoken;
          $user->save();
        }
      
        return [
          "status"=>"ok",
          "idU" => $user->id,
          "name"=> $user->name,
          "sector"=>$user->sector->name,
        ];
      }else{
        return[
          "status"=>"err",
          "messages"=>[ 0=>"Usuario/contraseña incorrecto" ],
        ];
      }
    }
}
