<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//文章创建页面 get方式
Route::get('/posts/create', '\App\Http\Controllers\PostsController@create');

//文章编辑页面
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostsController@edit');

//文章列表页面
Route::get('/posts', '\App\Http\Controllers\PostsController@index');


//文章详情页面  get访问方式 控制器/对象
Route::get('/posts/{post}', '\App\Http\Controllers\PostsController@show');

//文章创建逻辑
Route::post('/posts', '\App\Http\Controllers\PostsController@store');

//图片上传
Route::post('/posts/images/upload', '\App\Http\Controllers\PostsController@imagesUpload');

//文章修改逻辑
Route::put('/posts/{post}', '\App\Http\Controllers\PostsController@update');

//文章删除
Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostsController@delete');