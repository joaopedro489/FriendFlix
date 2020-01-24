<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{
  public function createUser(Request $request){
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
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
  public function uptadeUser(Request $request, $id){
    $user = User::find($id);
    if($user){
      if($request->name){
        $user->name = $request->name;
      }
      else if($request->email) {
        $user->email = $request->email;
      }
      else if($request->password){
        $user->password = $request->password;
      }
      else{
        return response()->json(['insira o parametro a ser atualizado']);
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
}
