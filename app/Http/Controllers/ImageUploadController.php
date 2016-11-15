<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ImageUploadController extends Controller
{
    public function upload($id, Request $request){
      $file = $request->file('file');
      if(!$file){
        return 'Error: No hay ningún archivo';
      }
      $destinationPath = 'img/dashboard';
      $filename = $id.'.'.$file->getClientOriginalExtension();

      $upload_success = $request->file('file')->move($destinationPath, $filename);

      if( $upload_success ) {
         if($request->fallback){
           return redirect()->back();
         }
         return response()->json('success', 200);
      } else {
         return response()->json('Error: No se pudo cargar el archivo', 400);
      }
    }
}
