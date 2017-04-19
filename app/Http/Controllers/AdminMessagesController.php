<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AdminMessage;
use App\User;
use Illuminate\Support\Facades\Auth;
use Log;
use Validator;

class AdminMessagesController extends Controller
{
    public function createMessage(Request $request){
      $this->validate($request,[
        'body' => 'required|min:20|max:255',
      ]);

      $message = new AdminMessage;
      $message->body_message = $request->input('body');
      $message->user_id = Auth::user()->id;
      $message->sent_date = \Carbon\Carbon::now();

      $message->save();

      return view('messages.composeconfirm');
    }

    public function viewMessage($id){
      $message = AdminMessage::findOrFail($id);
      $message->read = true;
      $message->save();
      return view('messages.view', ['message' => $message]);
    }

    public function deleteMessages(Request $request){
      foreach($request->ids as $id){
        $msg = AdminMessage::find($id);
        $msg->delete();
      }

      return "ok";
    }

    public function createMessageFromMobile(Request $request){
      try{
        $validator = Validator::make($request->all(),[
          'body' => 'required|min:20|max:255',
          'userid' => 'required|digits_between:1,10',
        ]);

        if ($validator->fails()) {
          return [
            "status"=>"err",
            "messages"=>($validator->messages()->all()),
          ];
        }
        $user = User::findOrFail($request->input('userid'));
        $message = new AdminMessage;
        $message->body_message = $request->input('body');
        $message->user_id = $request->input('userid');
        $message->sent_date = \Carbon\Carbon::now();

        $message->save();
        return [
          "status"=>"ok",
        ];
      }catch(\Exception $e){
        return [
          "status"=>"err",
          "messages"=>['El usuario solicitado no existe'],
        ];
      }
    }
}
