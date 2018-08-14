@extends('admin.layout.main')

@section('content')

    <div class="box">

        <!-- /.box-header -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">增加角色</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/admin/role/store" method="POST">
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">角色名</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">描述</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>
    </div>

    @endsection