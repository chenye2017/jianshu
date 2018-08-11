<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/11
 * Time: 17:19
 */

namespace App\Admin\Controllers;


use App\AdminUser;
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
}