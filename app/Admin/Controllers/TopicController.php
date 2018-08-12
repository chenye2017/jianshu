<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/12
 * Time: 0:25
 */

namespace App\Admin\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::orderBy('id', 'desc')->paginate('2');
        return view('admin.topic.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.topic.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $name = $request->input('name');
        Topic::create(compact('name'));

        return redirect('/admin/topics');
    }

    public function update(Request $request, Topic $topic)
    {
        $topic->name = $request->input('name');
        $topic->save();

    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return [
            'error' => 0,
            'msg' => '删除成功'
        ];
    }
}