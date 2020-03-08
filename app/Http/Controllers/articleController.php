<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class articleController extends Controller
{
    //
    // article

    public function getAllArticles(){
      $article = Article::all();
      return $article;
    }

    public function getArticle($id){
      $article = Article::find($id);
      $n = count($article);
      return ($n > 0) ? $article : response()->json(['menssage' => 'artículo no encontrado', 'status' => '500'], 200);
    }

    public function getArticleId($id){
      $article = Article::find($id);
      return $article;
    }

    public function addArticles(Request $request){
      $articleVerifc = Article::where('title', '=', $request->title)->first();
      $n = count($articleVerifc);
      if($n > 0){
            return response()->json(['menssage' => 'ya existe un artículo con este título', 'status' => '500'], 500);
      } else {
            $article = Article::create($request->all());
            return response()->json(['menssage' => 'artículo creado con exito', 'status' => '200'], 200);  
      }
    }

    public function updateArticle($id, Request $request){
        $article = $this->getArticleId($id);
        $n = count($article);
        if($n > 0){
            $article = $article->fill($request->all())->save();
            return response()->json(['menssage' => 'artículo editado con exito', 'status' => '200'], 200);
        } else {
            return response()->json(['menssage' => 'artículo no encontrado', 'status' => '500'], 500);
        }
    }

    public function deleteArticles($id){
        $article = $this->getArticleId($id);
        $n = count($article);
        if($n > 0){
            $article->delete();
            return response()->json(['menssage' => 'artículo eliminado con exito', 'status' => '200'], 200);
        } else {
            return response()->json(['menssage' => 'artículo no encontrado', 'status' => '500'], 500);
        }
    }
}
