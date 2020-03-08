<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    //
    // users
    public function getUsers(){
        $user = User::all();
        return $user;
     }
 
     public function getUserId($id){
         $user = User::find($id);
         $n = count($user);
         if($n > 0){
            return $user;
         } else {
            return response()->json([], 200);
         }
      }
 
     public function addUser(Request $request){
        //$password = $request->input('password');
        $userVerifict = User::where('email', '=', $request->email)->first();
        $n = count($userVerifict);
        if($n > 0){
            return response()->json(['menssage' => 'correo ya se encuentra registrado', 'status' => '500'], 500);
        } else {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                ]);
                return response()->json(['menssage' => 'usuario creado con exito', 'status' => '200'], 200);
        }
     }
 
     public function updateUsers($id, Request $request){
         $user = User::where('id', '=', $id)->first();
         $n = (count($user) > 0) ? true : false;
         if(!$n){
            return response()->json(['menssage' => 'usuario no se encuentra registrado', 'status' => '500'], 500);
         } else {
            $user->fill($request->all())->save();
            return response()->json(['menssage' => 'usuario editado con exito', 'status' => '200'], 200);
         }
     }
 
     public function deleteUser($id){
        $user = User::where('id', '=', $id)->first();
        $n = (count($user) > 0) ? true : false;
         if(!$n){
            return response()->json(['menssage' => 'usuario no se encuentra registrado', 'status' => '500'], 500);
         } else {
            $user->delete();
            return response()->json(['menssage' => 'usuario eliminado con exito', 'status' => '200'], 200);
         }
     }
}
