<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/11
 * Time: 17:19
 */

namespace App\Admin\Controllers;


use App\AdminPermission;
use App\AdminUser;
use App\AdminRole;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Admin\Controllers
 *
 */
class UserController extends Controller
{
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $name     = $request->input('name');
        $password = $request->input('password');

        $this->validate($request, [
            'name'     => 'required|unique:admin_users,name',
            'password' => 'required'
        ]);
        // 密码加密
        $password = bcrypt($password);

        AdminUser::create(compact('name', 'password'));

        return redirect('/admin/user');
    }

    public function index()
    {
        $users = AdminUser::orderBy('id', 'asc')->paginate(2);

        return view('admin.user.index', compact('users'));
    }

    public function role(AdminUser $adminUser)
    {
        $roles = AdminRole::all();

        $userrole = $adminUser->roles;
        $userid = $adminUser->id;

        return view('admin.user.role', compact('roles', 'userrole', 'userid'));
    }

    public function storeRole(AdminUser $adminUser, Request $request)
    {
        $role = $request->input('roles', []);
        $roles = AdminRole::find($role);

        $userRole = $adminUser->roles;

        //delete
        $delete = $userRole->diff($roles);
        foreach ($delete as $d_value) {
            $adminUser->roles()->detach($d_value);
        }

        //save
        $save = $roles->diff($userRole);
        foreach ($save as $s_value) {
            $adminUser->roles()->save($s_value);
        }
        return redirect('/admin/user/'.$adminUser->id.'/role');
    }

    public function test(AdminUser $adminUser)
    {

        $permission = AdminPermission::find(1);
        dd($adminUser->hasPermission($permission));
    }
}