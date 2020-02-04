<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\User;
use App\Movie;
use App\Http\Resources\Users as UserResource;

class UserController extends Controller{
  public function createUser(UserRequest $request){
      $validator = Validator::make($request->all(),[
        
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->number = $request->number;
      $user->birth = $request->birth;
      $user->CPF = $request->CPF;
      $user->password = $request->password;
      $user->save();
      return response()->json([$user]);
  }
  public function listUser(){
    $paginator = User::paginate(10);
    $user = UserResource::collection($paginator);
    $last = $paginator->lastPage();
    return response()->json([$user, $last]);
  }
  public function showUser($id){
    return response()->json(new UserResource(User::find($id)));
  }
  public function updateUser(UserRequest $request, $id){
    $validator = Validator::make($request->all(),[
        
      ]);
      if($validator->fails()){
        return response()->json($validator->errors());
      }
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
      if($request->CPF){
        $user->CPF = $request->CPF;
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
