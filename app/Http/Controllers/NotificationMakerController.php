<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\NotificationMaker;

class NotificationMakerController extends Controller
{
    public function getMaker(Request $request){
      $user = User::first();
      $maker = NotificationMaker::firstOrCreate(['user_id' => $user->id]);
      $request->session()->put('maker', $maker);
      //return view('notification.notification');
      return redirect()->action('NotificationMakerController@getMakerStep', ['step' => 1]);
    }

    public function getMakerStep(Request $request, $step){
      switch($step){
        case 1:
          return view('notification.notification', ['maker' => $request->session()->get('maker')]);
          break;
        case 2:
          return view('notification.notification2');
          break;
        case 3:
          return view('notification.notification3');
          break;
        case 4:
          echo $request->session()->get('maker', function() {
              return redirect()->action('NotificationMakerController@getMaker');
          });
          break;
        default:
          abort(400, "Error: No such step");
      }
    }

    public function postMakerData(Request $request, $step){
      switch($step){
        case 1:
          $this->validate($request,[
            'title' => 'required|min:2|max:50',
            'body' => 'required|min:2|max:255',
          ]);
          $request->session()->get('maker')->update($request->only('title', 'body'));

          return redirect()->action('NotificationMakerController@getMakerStep', ['step' => 2]);
          break;
        case 2:
          break;
        case 3:
          break;
        default:
          abort(400, "Error: No such step");
        break;
      }

    }
}
