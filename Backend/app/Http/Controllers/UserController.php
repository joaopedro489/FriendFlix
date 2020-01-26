<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie;

class UserController extends Controller{
  public function createUser(Request $request){
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->number = $request->number;
      $user->birth = $request->birth;
      $user->password = $request->password;
      $user->save();
      return response()->json([$user]);
  }
  public function listUser(){
    $user = User::all();
    return response()->json($user);
  }
  public function showUser($id){
    $user = User::findOrFail($id);
    return response()->json([$user]);
  }
  public function updateUser(Request $request, $id){
    $user = User::find($id);
    if($user){
      if($request->name){
        $user->name = $request->name;
      }
      if($request->email) {
        $user->email = $request->email;
      }
      if($request->number){
        $user->number = $request->number;
      }
      if($request->birth){
        $user->birth = $request->birth;
      }if($request->password){
        $user->password = $request->password;
      }
      $user->save();
      return response()->json([$user]);
    }
    else{
        return response()->json(['Este user nao existe']);
    }
  }
  public function deleteUser($id){
    User::destroy($id);
    return response()->json(['User deleteado']);
  }
  public function addMovieOnTheList($user_id, $movie_id){
      $user = User::find($user_id);
      $user->movies()->attach($movie_id);
      return response()->json(['Filme adicionado na lista']);
  }
  public function deleteMovieOnTheList($user_id, $movie_id){
      $user = User::find($user_id);
      $user->movies()->detach($movie_id);
      return response()->json(['Filme removido na lista']);
  }
}
