<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticesController extends Controller
{
    //
    public function index()
    {
        $user = \Auth::user();


        $notices = $user->notices()->paginate('2');;

        return view('notices.index', compact('notices'));
    }
}
