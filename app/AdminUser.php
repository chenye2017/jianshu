<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUser extends Authenticatable
{
    //
    use Notifiable;



    protected $fillable = ['name', 'password'];

    public function roles()
    {
        return $this->belongsToMany('App\AdminRole', 'user_roles', 'user_id', 'role_id');
    }

    public function inRoles($role)
    {

        $count = $role->intersect($this->roles)->count();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function hasPermission($permission)
    {

        $role = $permission->roles;
        return $this->inRoles($role);
    }
}
