<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoriController extends Controller
{
    //
    //categories

    public function getAllCategories(){
        $categories = Category::all();
        return $categories;
    }

    public function getCategorie($id){
        $categorie = Category::find($id);
        //$categorie = Category::where('id', '=', $id)->first();
        $n = (count($categorie) > 0) ? true : false;
        if($n){
            return $categorie;
        } else {
            return response()->json([], 200); 
        }
    }

    public function addCategorie(Request $request){
        //$categorie = Category::create($request->all());
        $categorie = new Category;
        $cateverif = Category::where('name', '=', $request->name)->first();
        $n = count($cateverif);
        if($n > 0){
            return response()->json(['menssage' => 'categoria ya existe', 'status' => '500'], 500);
        } else {
            $categorie->name = $request->name;
            $categorie->save();
            return response()->json(['menssage' => 'categoria creada con exito', 'status' => '200'], 200);
        }
    }

    public function updateCategorie($id, Request $request){
        $categorie = $this->getCategorie($id);
        $n = count($categorie);
        if($n < 1){
            return response()->json(['menssage' => 'categoria no registrada', 'status' => '500'], 500);
        } else {
            $categorie->name = $request->name;
            $categorie->save();
            return response()->json(['menssage' => 'categoria editada con exito', 'status' => '200'], 200);
        }
    }

    public function deteteCategorie($id){
        //$categorie = $this->getCategorie($id);
        $categorie = Category::where('id', '=', $id)->first();
        $n = (count($categorie) > 0) ? true : false;
        if(!$n){
            return response()->json(['menssage' => 'categoria no registrada', 'status' => '500'], 500);
        } else {
            $categorie->delete();
            return response()->json(['menssage' => 'categoria eliminada con exito', 'status' => '200'], 200);
        }
    }
}
