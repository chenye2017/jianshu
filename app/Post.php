<?php

namespace App;

use App\BasicModel;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }



}
