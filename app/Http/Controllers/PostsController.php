<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class PostsController extends Controller
{
    //获取文章列表页
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->withCount('comments')
            ->paginate('6');
        return view('posts/index', compact('posts'));
    }

    //文章详情页面
    public function show($post)
    {
        $post = Post::find($post);
        $post->load('comments');  //模板的预加载
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
        $post = Post::create([
            'title'=>$request['title'],
            'content'=>$request['content'],
            'user_id'=>Auth::id()
        ]);

        //return redirect('/posts');
    }

    //编辑页展示
    public function edit(Post $post)
    {
        return view('posts/edit', compact('post'));
    }

    //编辑页面实际逻辑
    public function update(Post $post, Request $request)
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

    public function delete(Post $post)
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

    //添加评论
    public function comment(Post $post, Request $req)
    {
        //表单校验
        $this->validate($req, [
            'content' => 'required|min:3'
        ]);

        $comment = new Comment();
        $comment->content = $req->content;
        $comment->user_id = \Auth::id();
        $post->comments()->save($comment);

        return back();
    }
}
