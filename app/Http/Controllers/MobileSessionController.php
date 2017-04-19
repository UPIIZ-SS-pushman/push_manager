<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserType;
use App\Sector;
use App\User;
use App\Notification;
use App\NotificationLog;
use App\NotificationIndividual;
use App\NotificationSector;
use Log;
use Validator;
use Auth;
use Exception;

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

    public function fetchNotifications($user_id){
      try{
        $user = User::findOrFail($user_id);
        $notInd = NotificationIndividual::where('user_id', $user->id)->take(10)->get();
        $notSec = NotificationSector::where('sector_id', $user->sector_id)->take(10)->get();

        $notifications = array();
        foreach($notInd as $ni){
          $notif = $ni->notification;
          if(!in_array($notif, $notifications)){
            $notifications[] = $notif;
          }
        }
        foreach($notSec as $ns){
          $notif = $ns->notification;
          if(!in_array($notif, $notifications)){
            $notifications[] = $notif;
          }
        }
        return [
          "status" => "ok",
          "data" => array_slice($notifications, 0, 10),
          ];
      }catch(Exception $e){
        return [
          "status" => "no",
        ];
      }
    }

    public function fetchUserData($user_id){
      try{
        $user = User::findOrFail($user_id);
        return ["result" => [
            "name" => $user->name,
            "lastname" => $user->lastname,
            "email"=> $user->email
          ]];
      }catch(Exception $e){
        return[
        ];
      }
    }

    public function updateUserData($user_id, Request $request){
      try{
        $user = User::findOrFail($user_id);
        Log::info("Updating user data");
        $validator = Validator::make($request->all(),[
          'name' => 'required',
          'lastname' => 'required',
          'email' => 'required|min:3|max:25|email',
          'password' => 'bail|required|min:3|max:15',
          'newpassword' => 'bail|min:3|max:15',
        ]);

        if ($validator->fails()) {
          return [
            "status"=>"err",
            "messages"=>($validator->messages()->all()),
          ];
        }

        $credentials = $request->only('password');
        $credentials['username'] = $user->username;
        if(Auth::once($credentials)){
          if($request->input('newpassword') != null && $request->input('newpassword')!= ""){
            $user->password = bcrypt($request->input('newpassword'));
          }
          if($request->input('email') != $user->email){
            $validator = Validator::make($request->all(),[
              'email' => 'required|min:3|max:25|email|unique:users,email',
            ]);
            if ($validator->fails()) {
              return [
                "status"=>"err",
                "messages"=>($validator->messages()->all()),
              ];
            }
            $user->email = $request->input('email');
          }
          $user->name = $request->input('name');
          $user->lastname = $request->input('lastname');

          $user->save();
          return [
            "status" => "ok",
            ];
        }else{
          return [
            "status" => "err",
            "messages"=>['Usuario/contraseña incorrecto'],
            ];
        }
      }catch(Exception $e){
        return [
          "status"=>"err",
          "messages"=>['El usuario solicitado no existe'],
        ];
      }
    }
}
