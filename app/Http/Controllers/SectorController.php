<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sector;
use App\User;

class SectorController extends Controller
{
    public function present(){
        $sector = Sector::all();
    
        return view('sector', ['sectors' => $sector]);
    }
    
    public function deleteSector(){
        $id = $_POST["idDel"];
        
        $users=User::all();
        foreach($users as $user){
            if($id == $user->sector_id){
                $user->update([
                    'sector_id' => 0]);
            }
        }
        
        $sector=Sector::find($id);
        $sector->delete();
        
        return back();
    }
    
    public function updateSector(Request $request){
        $this->validate($request,[
            'namePop' => 'required|min:5|max:255|unique:sectors,name,'.$request->idPop,
        ]);
        
        $sector=Sector::find($request->idPop);
        
        $sector->update([
            'name' => $request->input('namePop'),
            'user_type_id' => $request->input('typePop')
        ]);
    
        return back();
    }
    
    public function createSector(Request $request){
        $this->validate($request,[
            'namePop2' => 'required|min:5|max:255|unique:sectors,name',
        ]);
        
        $sector = new Sector;
        $sector->name = $request->input('namePop2');
        $sector->user_type_id = $request->input('typePop2');
        $sector->save();
    
        return back();
    }
    
    public function deleteSectors(Request $request){
        foreach($request->ids as $id){
            $sector = Sector::find($id);
            $sector->delete();
        }
        
        return back();
    }
}
