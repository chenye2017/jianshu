<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/11
 * Time: 15:19
 */
namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        //验证
        $this->validate($request, [
            'name'=>'required',
            'password'=>'required'
        ]);

        //门脸类完成登录功能
        if (\Auth::guard('admin')->attempt(['name'=>$request->name, 'password'=>$request->password], $request->is_remember))
        {
            return redirect('/admin/home');
        } else {
            return Redirect::back()->withErrors('用户名和密码不匹配');
        }
    }
}