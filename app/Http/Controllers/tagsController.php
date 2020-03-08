<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class tagsController extends Controller
{
    //
    //tags
    public function getAllTags(){
      $tags = Tag::all();
      return $tags;
    }

    public function getTag($id){
        $tags = Tag::find($id);
        $n = count($tags);
        return ($n > 0) ? $tags : response()->json(['menssage' => 'tag no se encuentra registrado', 'status' => '500'], 500);
    }

    public function getTagid($id){
        $tags = Tag::find($id);
        return $tags;
    }

    public function addTag(Request $request){
        $tagsVerifc = Tag::where('name', '=', $request->name)->first();
        $n = count($tagsVerifc);
        if($n > 0){
            return response()->json(['menssage' => 'tag ya se encuentra registrado', 'status' => '500'], 500);
        } else {
            $tags = Tag::Create($request->all());
            return response()->json(['menssage' => 'tag creado con exito', 'status' => '200'], 200);
        }
    }

    public function updateTag($id, Request $request){
       $tag = $this->getTagid($id);
       $n = count($tag);
       if($n > 0){
            $tag->fill($request->all())->save();
            return response()->json(['menssage' => 'tag actualizado con exito', 'status' => '200'], 200);
       } else {
            return response()->json(['menssage' => 'tag no se encuentra registrado', 'status' => '500'], 500);
       }
    }

    public function deleteTag($id){
        $tag = $this->getTagid($id);
        $n = count($tag);
        if($n < 1){
           return response()->json(['menssage' => 'tag no se encuentra registrado', 'status' => '500'], 500);
        } else {
           $tag->delete();
           return response()->json(['menssage' => 'tag eliminado con exito', 'status' => '200'], 200);
        }
    }
}
