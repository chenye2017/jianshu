<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    //
    protected $fillable = [
        'star_id',
        'fan_id'
    ];

    public function fuser()
    {
        //return $this->hasOne('\App\User', 'id', 'user_id');
        return $this->belongsTo('\App\User', 'fan_id', 'id');
    }

    public function suser()
    {
        //return $this->hasOne('\App\User', 'id', 'user_id');
        return $this->belongsTo('\App\User', 'star_id', 'id');
    }
}
