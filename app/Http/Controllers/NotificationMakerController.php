<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\NotificationMaker;

class NotificationMakerController extends Controller
{
    public function getMaker(){
      $user = User::first();
      $maker = NotificationMaker::firstOrCreate(['user_id' => $user->id]);

      //return view('notification.notification');
      return redirect()->action('NotificationMakerController@getMakerStep', ['step' => 1]);
    }

    public function getMakerStep(Request $request, $step){
      switch($step){
        case 1:
          return view('notification.notification');
          break;
        case 2:
          return view('notification.notification2');
          break;
        case 3:
          return view('notification.notification3');
          break;
        default:
          abort(400, "Error: No such step");
      }
    }
}
