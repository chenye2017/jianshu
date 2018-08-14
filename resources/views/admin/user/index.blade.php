
@extends('admin.layout.main')

@section('content')

                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">用户列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/user/create" >增加用户</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">#</th>
                                    <th>用户名称</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a type="button" class="btn" href="/admin/user/{{$user->id}}/role" >角色管理</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody></table>
                            {{ $users->links() }}
                        </div>

                    </div>

@endsection()