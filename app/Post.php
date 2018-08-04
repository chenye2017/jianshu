<?php

namespace App;

use App\BasicModel;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('\App\user', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function zan($userid)
    {
        return  $this->hasMany('App\Zan')->where('user_id', $userid);
    }

    public function zans()
    {
        return  $this->hasMany('App\Zan');
    }


}
