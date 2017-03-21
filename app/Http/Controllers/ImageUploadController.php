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
      foreach(glob($destinationPath."/".$id.".*") as $ftd){
        if(!unlink($ftd)){
          file_put_contents($destinationPath."log.txt", "error deleting file: ".$ftd);
        }

      }

      $upload_success = $request->file('file')->move($destinationPath, $filename);

      if( $upload_success ) {
        $this->makeThumbnails($destinationPath, $filename, "");
         if($request->fallback){
           return redirect()->back();
         }
         return response()->json('success', 200);
      } else {
         return response()->json('Error: No se pudo cargar el archivo', 400);
      }
    }

    public function makeThumbnails($updir, $img, $id)
    {
        $thumbnail_width = 120;
        $thumbnail_height = 120;
        $thumb_beforeword = "thumb";
        $arr_image_details = getimagesize("$updir" . $id ."/". "$img"); // pass id to thumb name
        $original_width = $arr_image_details[0];
        $original_height = $arr_image_details[1];
        if ($original_width > $original_height) {
            $new_width = $thumbnail_width;
            $new_height = intval($original_height * $new_width / $original_width);
        } else {
            $new_height = $thumbnail_height;
            $new_width = intval($original_width * $new_height / $original_height);
        }
        $dest_x = intval(($thumbnail_width - $new_width) / 2);
        $dest_y = intval(($thumbnail_height - $new_height) / 2);
        if ($arr_image_details[2] == IMAGETYPE_GIF) {
            $imgt = "ImageGIF";
            $imgcreatefrom = "ImageCreateFromGIF";
        }
        if ($arr_image_details[2] == IMAGETYPE_JPEG) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        }
        if ($arr_image_details[2] == IMAGETYPE_PNG) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        }
        if ($imgt) {
            $old_image = $imgcreatefrom("$updir" . $id . '/' . "$img");
            $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
            imagecopyresized($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
            $imgt($new_image, "$updir" . '-thumb/' . "$thumb_beforeword" . "$img");
        }
    }
}
