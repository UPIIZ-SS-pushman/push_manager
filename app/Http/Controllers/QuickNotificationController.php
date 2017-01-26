<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuickNotificationController extends Controller
{
    //
    private function getMakerByUser(){
      /*TODO
        change this line to get the real user
      */
      $user = User::first();
      $maker = NotificationMaker::firstOrCreate(['user_id' => $user->id]);
      //$request->session()->put('maker', $maker);
      return $maker;
    }

    public function postQuickNotificaion(Request $request){
    	$this->validate($request,[
            'title' => 'required|min:2|max:50',
            'body' => 'required|min:2|max:255',
        ]);	
    }
}
