<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use function Sodium\compare;

class PostsController extends Controller
{
    //获取文章列表页
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')->paginate('6');
        return view('posts/index', compact('posts'));
    }

    //文章详情页面
    public function show($post)
    {
        $post = Posts::find($post);
        return view('posts/show', compact('post'));
    }

    //文章创建页面
    public function create()
    {
        return view('posts/create');
    }

    //文章创建实际保存逻辑
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string|max:100|min:5',
            'content'=>'required'
        ]);
        $post = Posts::create([
            'title'=>$request['title'],
            'content'=>$request['content']
        ]);

        return redirect('/posts');
    }

    //编辑页展示
    public function edit(Posts $post)
    {
        return view('posts/edit', compact('post'));
    }

    //编辑页面实际逻辑
    public function update(Posts $post, Request $request)
    {
        //参数验证
        $this->validate($request, [
            'title'=>'required|string|max:100|min:5',
            'content'=>'required'
        ]);

        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return redirect("/posts/{$post->id}");
    }

    public function delete(Posts $post)
    {
        $post->delete();
        return redirect('/posts');
    }


    //图片上传保存在服务器端，返回保存地址
    public function imagesUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('/storage/'.$path);
    }
}
