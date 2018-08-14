<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/14
 * Time: 15:32
 */

namespace App\Admin\Controllers;

use App\AdminPermission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = AdminPermission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'description' => 'required'
        ]);

        $name = $request->input('name');
        $description= $request->input('description');

        AdminPermission::create(compact('name', 'description'));
        return redirect('/admin/permission');
    }
}