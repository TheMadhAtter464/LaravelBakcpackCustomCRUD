<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = "Posts";
  protected $fillable = ['title', 'body', 'image'];

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }
}
