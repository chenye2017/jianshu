<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/7/28
 * Time: 11:44
 */

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test()
    {

        $name = 'll2';
        return view('test/test', compact('name'));
    }

    public function test1()
    {
        dd(asset('images/ss.jpg'));
    }

    public function test2()
    {
        return view('test/test1');
        //dd(DB::table('posts')->get());
        dd(Post::find(51)->delete());

        var_dump(DB::table('posts')->where('user_id', '=', '0')->get());

        var_dump(Post::where('user_id', '=', '0')->find());
        //dd(Post::all());
        exit;
    }
}