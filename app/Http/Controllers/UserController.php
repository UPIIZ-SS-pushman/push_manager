<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Sector;

class UserController extends Controller
{
    public function present(){
        $sector = Sector::all();
    
        return view('user', ['sectors' => $sector]);
    }
    
    public function deleteUser(){
        $id = $_POST["idDel"];
        $user=User::find($id);
        $user->delete();
        
        return back();
    }
    
    public function updateUser(Request $request){
        $this->validate($request,[
        'userPop' => 'required|min:3|max:254|unique:users,username,'.$request->idPop,
        'namePop' => 'required|min:4|max:254',
        'lastnamePop' => 'required|min:5|max:254',
        'emailPop' => 'required|min:3|max:254|email|unique:users,email,'.$request->idPop,
        ]);
        
        $user=User::find($request->idPop);
        
        $user->update([
            'username' => $request->input('userPop'),
            'name' => $request->input('namePop'),
            'lastname' => $request->input('lastnamePop'),
            'email' => $request->input('emailPop'),
            'user_type_id' => $request->input('typePop'),
            'sector_id' => $request->input('sectorPop')
        ]);
    
        return back();
    }
    
    public function createUser(Request $request){        
        $this->validate($request,[
        'userPop2' => 'bail|required|min:3|max:254|unique:users,username',
        'passwordPop2' => 'bail|required|min:3|max:254',
        'namePop2' => 'required|min:4|max:254',
        'lastnamePop2' => 'required|min:5|max:254',
        'emailPop2' => 'required|min:3|max:254|email|unique:users,email'
        ]);
        
        $user = new User;
        $user->username = $request->input('userPop2');
        $user->name = $request->input('namePop2');
        $user->lastname = $request->input('lastnamePop2');
        $user->email = $request->input('emailPop2');
        $user->user_type_id = $request->input('typePop2');
        $user->sector_id = $request->input('sectorPop2');
        $user->password = bcrypt($request->input('passwordPop2'));
        $user->save();
        
        return back();
    }
    
    public function deleteUsers(Request $request){
        foreach($request->ids as $id){
            $user = User::find($id);
            $user->delete();
        }
    }
}
