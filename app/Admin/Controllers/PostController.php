<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/12
 * Time: 0:25
 */

namespace App\Admin\Controllers;


use App\Post;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'asc')->status()->paginate(10);

        return view('admin.post.index', compact('posts'));
    }

    public function handle(Post $post, Request $request)
    {
        $post->status = $request->input('status');
        $post->save();

        return [
            'error' => 0,
            'msg' => '处理成功'
        ];
    }
}