<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户个人信息页面
    public function setting()
    {
        $user = \Auth::user();
        return view('user/setting', compact('user'));
    }

    //用户个人信息保存逻辑
    public function settingStore(Request $req)
    {
        //验证参数
        $this->validate($req, [
            'name' => 'required',
        ]);

        //
        $user = \Auth::user();
        if ($req->name != $user->name) {
            if (User::where('name', '=', $req->name)
                ->count() == 0 ) {
                $user->name = $req->name;
            } else {
                session()->flash('danger', '用户名已经被注册');
            }
        }


        if ($req->file('avatar')) {
            $path = $req->file('avatar')->storePublicly($user->id);
            $user->avatar = '/storage/'.$path;
        }


        $user->save();
        session()->flash('success', '修改成功');
        return back();
    }
}
