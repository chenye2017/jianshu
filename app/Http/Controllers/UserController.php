<?php

namespace App\Http\Controllers;

use App\Fan;
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

    public function show(User $user)
    {
        

        $posts = $user->posts()->orderBy('created_at')->take(10)->get();

        $user = User::withCount(['posts', 'fans', 'stars'])->find($user->id);

        $fans = $user->fans()->get();
        $stars  = $user->stars()->get();

        return view('user/show', compact('posts', 'user', 'fans', 'stars'));
    }

    public function fan(User $user)
    {
        $fan_id = \Auth::id();
        $star_id = $user->id;
        Fan::firstOrCreate(compact('fan_id', 'star_id'));

        return [
            'errCode'=>0,
            'errMsg'=>'关注成功'
        ];
    }

    public function unfan(User $user)
    {
        $id = \Auth::id();
        Fan::where('fan_id', $id)->where('star_id', $user->id)->delete();

        return [
            'errCode' => 0,
            'errMsg' => '取消成功'
        ];
    }
}
