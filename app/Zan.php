<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zan extends Model
{
    //
    protected $fillable = [
        'user_id',
        'post_id'
    ];
}
