<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/11
 * Time: 15:34
 */

namespace App\Admin\Controllers;


class HomeController extends Controller
{
    public function index()
    {

        return view('admin.home.index');
    }
}