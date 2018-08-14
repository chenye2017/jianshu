<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function roles()
    {
        return $this->belongsToMany('App\AdminRole', 'role_permissions', 'permission_id', 'role_id');
    }
}
