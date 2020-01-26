<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
  public function createPost(Request $request){
      $post = new Post();
      $post->title = $request->title;
      $post->likes = $request->likes;
      $post->text = $request->text;
      $post->dislikes = $request->dislikes;
      $post->user_id = $request->user_id;
      $post->save();
      return response()->json([$post]);
  }
  public function listPost(){
    $post = Post::all();
    return response()->json($post);
  }
  public function showPost($id){
    $post = Post::findOrFail($id);
    return response()->json([$post]);
  }
  public function updatePost(Request $request, $id){
    $post = Post::find($id);
    if($post){
      if($request->title){
        $post->title = $request->title;
      }
      if($request->likes) {
        $post->likes = $request->likes;
      }
      if($request->text){
        $post->text = $request->text;
      }
      if($request->dislikes){
        $post->dislikes = $request->dislikes;
      }
      if($request->user_id){
        $post->user_id = $request->user_id;
      }
      $post->save();
      return response()->json([$post]);
    }
    else{
        return response()->json(['Este post nao existe']);
    }
  }
  public function deletePost($id){
    Post::destroy($id);
    return response()->json(['post deleteado']);
  }
}
