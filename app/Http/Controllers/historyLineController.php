<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notification;

class historyLineController extends Controller
{
    public function present(){
        $notif = Notification::all();
        
        return view('historyLine', ['notif' => $notif]);
    }
    
    public function deleteNotification(Request $request){
        $this->validate($request,[
            'idDel' => 'required',
        ]);
        $notid = $request->input('idDel');
        $notif = Notification::find($notid);
        $notif->delete();

        return back();
    }
}
