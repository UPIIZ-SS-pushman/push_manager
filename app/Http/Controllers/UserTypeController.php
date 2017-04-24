<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserType;
use App\User;

class UserTypeController extends Controller
{
    public function present(){
        $type = UserType::all();

        return view('userType', ['types' => $type]);
    }

    public function deleteSector(){
        $id = $_POST["idDel"];

        if($id == 1){
          return "You can't delete the admins!";
        }
        
        $users=User::all();
        foreach($users as $user){
            if($id == $user->user_type_id){
                $user->update([
                    'user_type_id' => 0]);
            }
        }
        
        $type=UserType::find($id);
        $type->delete();

        return back();
    }

    public function updateSector(Request $request){
        $this->validate($request,[
            'namePop' => 'required|min:5|max:255|unique:user_types,name,'.$request->idPop,
        ]);

        $type=UserType::find($request->idPop);

        $type->update([
            'name' => $request->input('namePop')
        ]);

        return back();
    }

    public function createSector(Request $request){
        $this->validate($request,[
            'namePop2' => 'required|min:5|max:255|unique:user_types,name',
        ]);

        $type = new UserType;
        $type->name = $request->input('namePop2');
        $type->save();

        return back();
    }

    public function deleteSectors(Request $request){
        foreach($request->ids as $id){
          if($id != 1){
            $type = UserType::find($id);
            $type->delete();
          }
        }

        return back();
    }
}
