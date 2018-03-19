<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('login/index');
    }

    //登录逻辑
    public function login()
    {

    }

    //用户注销
    public function logout()
    {

    }

}
