<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //用户注册页面
    public function index()
    {
        return view('register/index');
    }

    //用户注册逻辑
    public function register(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|min:5|unique:users,name',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:10|confirmed',
        ]);

        $name     = $request->name;
        $email    = $request->email;
        $password = bcrypt($request->password);

        User::create(compact('name', 'email', 'password'));

        return redirect('/login');
    }


}
