<?php

Route::group(['prefix'=>'/admin'], function () {
    Route::get('/login', '\App\Admin\Controllers\LoginController@index');
    Route::post('/login', '\App\Admin\Controllers\LoginController@login');

    Route::group(['middleware'=>'auth:admin'], function () {
        Route::get('/home', '\App\Admin\Controllers\HomeController@index');
        Route::get('/user', '\App\Admin\Controllers\UserController@index'); //用户列表
        Route::get('/user/create', '\App\Admin\Controllers\UserController@create'); //创建页面
        Route::post('/user/store', '\App\Admin\Controllers\UserController@store'); //创建逻辑
        Route::get('/user/{admin_user}/role', '\App\Admin\Controllers\UserController@role'); //创建逻辑
        Route::post('/user/{admin_user}/role', '\App\Admin\Controllers\UserController@storeRole'); //创建逻辑

        Route::get('/post','\App\Admin\Controllers\PostController@index'); //文章审核列表页面
        Route::post('/post','\App\Admin\Controllers\PostController@handle'); //文章审核列表页面
        Route::post('/post/{post}/status','\App\Admin\Controllers\PostController@handle'); //文章审核列表页面

        Route::get('/topics', '\App\Admin\Controllers\TopicController@index');
        Route::get('/topics/create', '\App\Admin\Controllers\TopicController@create');
        Route::post('/topics', '\App\Admin\Controllers\TopicController@store');
        Route::delete('/topics/{topic}', '\App\Admin\Controllers\TopicController@destroy');

        Route::get('/notices', '\App\Admin\Controllers\NoticesController@index');
        Route::get('/notices/create', '\App\Admin\Controllers\NoticesController@create');
        Route::post('/notices', '\App\Admin\Controllers\NoticesController@store');

        //角色
        Route::get('/role', '\App\Admin\Controllers\RoleController@index');//首页
        Route::get('/role/create', '\App\Admin\Controllers\RoleController@create'); //添加页面
        Route::post('/role/store', '\App\Admin\Controllers\RoleController@store'); //添加页面
        Route::get('/role/{admin_role}/permission', '\App\Admin\Controllers\RoleController@permission');
        Route::post('/role/{admin_role}/permission', '\App\Admin\Controllers\RoleController@storePermission');
        Route::get('/role/{admin_user}/test', '\App\Admin\Controllers\UserController@test');

        //权限
        Route::get('/permission', '\App\Admin\Controllers\PermissionController@index');//首页
        Route::get('/permission/create', '\App\Admin\Controllers\PermissionController@create'); //添加页面
        Route::post('/permission/store', '\App\Admin\Controllers\PermissionController@store'); //添加页面

    });

});