<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('login/index');
    }

    //登录逻辑
    public function login(Request $request)
    {
        //验证
        $this->validate($request, [
            'email'=>'required|min:5|email',
            'password'=>'required|min:5|max:10'
        ]);

        //门脸类完成登录功能
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $request->is_remember))
        {
            return redirect('/posts');
        } else {
            return Redirect::back()->withErrors('用户名和密码不匹配');
        }
    }

    //用户注销
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
