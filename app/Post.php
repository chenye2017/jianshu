<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

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
        return $this->hasMany('App\Zan')->where('user_id', $userid);
    }

    public function zans()
    {
        return $this->hasMany('App\Zan');
    }

    /**
     * 只要那些未审批的文章
     * @param $query
     * @return mixed
     */
    public function scopeStatus($query)
    {
        return $query->where('status', 0);
    }
}
