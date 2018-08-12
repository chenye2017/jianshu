<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/12
 * Time: 22:25
 */

namespace App\Admin\Controllers;


use App\Jobs\SendMessage;
use App\Notice;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('created_at')->paginate(2);
        return view('admin.notice.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notice.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'content' => 'required'
        ]);

        $title   = $request->input('title');
        $content = $request->input('content');
        $notice  = Notice::create(compact('title', 'content'));
        SendMessage::dispatch($notice);

        return redirect('/admin/notices');
    }
}