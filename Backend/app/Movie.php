<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Movie extends Model
{
  public function users(){
  return $this->belongsToMany('App\User')->withTimestamps();
}
public function post(){
  return $this -> hasOne('App\Post');
}

}
