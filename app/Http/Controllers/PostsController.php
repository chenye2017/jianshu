<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Zan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //获取文章列表页
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->withCount('comments')
            ->withCount('zans')
            ->paginate('6');
        return view('posts/index', compact('posts'));
    }

    //文章详情页面
    public function show(Post $post)
    {
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
            'title'   => 'required|string|max:100|min:5',
            'content' => 'required'
        ]);
        $post = [
            'title'   => $request['title'],
            'content' => $request['content'],
            'user_id' => Auth::id()
        ];
        $post = Post::create($post);
        return redirect('/posts/' . $post->id); //相比较老师的写法，感觉这样更容易理解些，反正这个方法其实就是浏览器地址的变更，弄出一个浏览器能是别的地址就可以了，不用考虑写在浏览器上的内容是id还是什么内容
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
            'title'   => 'required|string|max:100|min:5',
            'content' => 'required'
        ]);

        //权限验证
        $this->authorize('update', $post);

        //逻辑
        $post->title   = $request['title'];
        $post->content = $request['content'];
        $post->save();

        //渲染
        return redirect("/posts/{$post->id}");
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        return redirect('/posts');
    }


    //图片上传保存在服务器端，返回保存地址
    public function imagesUpload(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('/storage/' . $path);
    }

    //添加评论
    public function comment(Post $post, Request $req)
    {
        //表单校验
        $this->validate($req, [
            'content' => 'required|min:3'
        ]);

        $comment          = new Comment();
        $comment->content = $req->input('content');
        $comment->user_id = \Auth::id();
        $comment->post_id = $post->id;

        /*$data = [
            'content' => $comment->content,
            'user_id' => $comment->user_id,
            'post_id' => $comment->post_id
        ];*/
        $comment->save();

        return back();
    }

    public function zan(Post $post)
    {
        $post_id = $post->id;
        $user_id = \Auth::id();
        Zan::firstOrCreate(compact('post_id', 'user_id'));
        return back();
    }

    public function unzan(Post $post)
    {
        $user_id = \Auth::id();
        $post->zan($user_id)->delete();
        return back();
    }
}
