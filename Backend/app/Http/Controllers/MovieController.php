<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie;
use App\Post;

class MovieController extends Controller
{
  public function createMovie(Request $request){
      $movie = new Movie();
      $movie->name = $request->name;
      $movie->genre = $request->genre;
      $movie->summary = $request->summary;
      $movie->running_time = $request->running_time;
      $movie->directed_by = $request->directed_by;
      $movie->save();
      return response()->json([$movie]);
  }
  public function listMovie(){
    $movie = Movie::all();
    return response()->json($movie);
  }
  public function showMovie($id){
    $movie = Movie::findOrFail($id);
    return response()->json([$movie]);
  }
  public function updateMovie(Request $request, $id){
    $movie = Movie::find($id);
    if($movie){
      if($request->name){
        $movie->name = $request->name;
      }
      if($request->genre) {
        $movie->genre = $request->genre;
      }
      if($request->summary){
        $movie->summary = $request->summary;
      }
      if($request->running_time){
        $movie->running_time = $request->running_time;
      }
      if($request->directed_by){
        $movie->directed_by = $request->directed_by;
      }
      $movie->save();
      return response()->json([$movie]);
    }
    else{
        return response()->json(['Este filme nao existe']);
    }
  }
  public function deleteMovie($id){
    Movie::destroy($id);
    return response()->json(['Filme deleteado']);
  }  
}
