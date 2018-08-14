<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/14
 * Time: 14:58
 */
namespace App\Admin\Controllers;

use App\AdminRole;
use App\AdminPermission;
use Symfony\Component\HttpFoundation\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = AdminRole::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'description'=>'required'
        ]);

        $name = $request->input('name');
        $description = $request->input('description');
        AdminRole::create(compact('name','description'));

        return redirect('/admin/role');
    }

    public function permission(AdminRole $adminRole)
    {

        $mypermission = $adminRole->permissions;
        $permissions = AdminPermission::all();

        $roleid = $adminRole->id;

        return view('admin.role.permission', compact('permissions', 'mypermission', 'roleid'));
    }

    public function storePermission(Request $request, AdminRole $adminRole)
    {
        //dd($request->input('permissions'));
        $permissions = $request->input('permissions');
        $permissions = AdminPermission::find($permissions);
        $mypermissions = $adminRole->permissions;
        //
        $delete = $mypermissions->diff($permissions);
        foreach ($delete as $d_value) {
            $adminRole->permissions()->detach($d_value);
        }

        $add = $permissions->diff($mypermissions);
        foreach ($add as $a_value) {
            $adminRole->permissions()->save($a_value);
        }

        return redirect('/admin/role/'.$adminRole->id.'/permission');
    }

}