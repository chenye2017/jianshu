<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户个人信息页面
    public function setting()
    {
        return view('user/setting');
    }

    //用户个人信息保存逻辑
    public function settingStore()
    {

    }
}
