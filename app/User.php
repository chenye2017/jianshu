<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('\App\Post', 'user_id', 'id');
    }

    public function fans()
    {
        return $this->hasMany('\App\Fan', 'star_id', 'id');
    }

    public function stars()
    {
        return $this->hasMany('\App\Fan', 'fan_id', 'id');
    }

    public function hasFan($userid)
    {
        return $this->hasMany('\App\Fan', 'star_id')->where('fan_id', $userid)->count();
    }

}
