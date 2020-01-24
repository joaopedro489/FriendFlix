<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;


class series extends Model
{
  public function user(){
    return $this->belongsTo('App\User')
  }
}
