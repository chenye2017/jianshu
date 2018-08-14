<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany('App\AdminPermission','role_permissions',  'role_id', 'permission_id')->withPivot('permission_id');
    }
}
