<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sector;

class SectorController extends Controller
{
    public function present(){
        $sector = Sector::all();
    
        return view('sector', ['sectors' => $sector]);
    }
    
    public function deleteSector(){
        $id = $_POST["idDel"];
        $sector=Sector::find($id);
        $sector->delete();
        
        return back();
    }
    
    public function updateSector(Request $request){
        $this->validate($request,[
            'namePop' => 'required|min:5|max:50|unique:sectors,name,'.$request->idPop,
        ]);
        
        $sector=Sector::find($request->idPop);
        
        $sector->update([
            'name' => $request->input('namePop')
        ]);
    
        return back();
    }
    
    public function createSector(Request $request){
        $this->validate($request,[
            'namePop2' => 'required|min:5|max:50|unique:sectors,name',
        ]);
        
        $sector = new Sector;
        $sector->name = $request->input('namePop2');
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