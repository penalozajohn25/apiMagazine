<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
class imagesController extends Controller
{
    // Images

    public function getImages(){
        $images = Image::all();
        return $images;
    }

    public function getImage($id){
        $image = Image::find($id);
        $n = count($image);
        if ($n > 0) {
            return $image;
        } else {
            return response()->json(['menssage' => 'Imagen no encontrada', 'status' => '500'], 500);
        }
    }


    public function getImageId($id){
        $image = Image::find($id);
        return $image;
      }

    public function addImage(Request $request){
        $imageverif = Image::where('name', '=', $request->name)->first();
        $n = count($imageverif);
        $image = Image::create($request->all());
        return response()->json(['menssage' => 'imagen guardada con exito', 'status'=> '200'], 200);
    }

    public function updateImage(Request $request){
        $image = $image->fill($request->all())->save();
        return response()->json(['menssage' => 'imagen editada con exito', 'status' => '200'], 200);
    }

    public function deleteImage($id){
       $image = $this->getImageId($id);
       $n = count($image);
       if ($n > 0) {
           $image->delete();
           return response()->json(['menssage' => 'imagen eliminada con exito', 'status' => '200'], 200);
       } else {
           return response()->json(['menssage' => 'imagen no encontrada', 'status' => '500'], 500);
       }
    }

}
