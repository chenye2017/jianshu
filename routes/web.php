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
Route::group(['prefix'=>'/test'], function () {
    Route::any('/test1/{id}', '\App\Http\Controllers\TestController@test1');
});


Route::get('/test/test', ['as'=>'test', 'uses'=>'TestController@test']);

Route::get('/test/test2', ['as'=>'test1', 'uses'=>'TestController@test2']);

Route::match(['get', 'post'], '/test1', function () {
   var_dump('lll');
});

//竟然是完全匹配，我记得以前 /test/9/t,是先匹配到上面这个
/*Route::get('/test/{id}', function ($name, $ll = '问问 ') {
    var_dump($name, $ll);
});*/

Route::get('/test/{id}/{name}', function ($id, $name) {
    var_dump($id, $name);
})->where(['id'=>'[1-9]', 'name'=>'[A-Z]']); //where，这个key对应的value难道只能写正则嘛

Route::get('/test1/{id}', ['as'=>'center', function ($id) {
   var_dump(route('center', $id));
}]);

Route::group(['prefix'=>'test2'], function () {
    Route::get('/ll/ll', function () {
        var_dump('ll');
    });
});

//用户注册页面
Route::get('/', function () {
    return redirect('/posts'); //或者login 都可以的
});
















//文章编辑页面
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostsController@edit');


//文章页面
Route::group(['prefix'=>'/posts'], function () {
    Route::get('/', '\App\Http\Controllers\PostsController@index'); //文章列表
    Route::get('/{post}', '\App\Http\Controllers\PostsController@show')->where(['post'=>'[0-9]+']); //文章详情
    Route::get('/create', '\App\Http\Controllers\PostsController@create'); //文章创建页面
    Route::post('/', '\App\Http\Controllers\PostsController@store'); //文章创建
    Route::put('/{post}', '\App\Http\Controllers\PostsController@update'); //文章保存
    Route::get('/{post}/delete', '\App\Http\Controllers\PostsController@delete'); //文章删除(因为这块是通过超链接的方式发送，只能是get方式)
    Route::post('/images/upload', '\App\Http\Controllers\PostsController@imagesUpload');//图片上传
    Route::post('/{post}/comment', '\App\Http\Controllers\PostsController@comment');//图片上传
    Route::get('/{post}/zan', '\App\Http\Controllers\PostsController@zan');
    Route::get('/{post}/unzan', '\App\Http\Controllers\PostsController@unzan');

});

//注册
Route::group(['prefix'=>'/register'], function () {
    Route::get('/', '\App\Http\Controllers\RegisterController@index');
    Route::post('/', '\App\Http\Controllers\RegisterController@register');
});


//登录
Route::group(['prefix'=>'/login'], function () {
    Route::get('/', '\App\Http\Controllers\LoginController@index')->name('login');
    Route::post('/', '\App\Http\Controllers\LoginController@login');
});

//用户注销
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');

//用户
Route::group(['prefix'=>'/user', 'middleware'=>'auth:web'], function () {
    Route::get('/me/setting', '\App\Http\Controllers\UserController@setting');
    Route::post('/me/setting', '\App\Http\Controllers\UserController@settingStore');
    Route::get('/{user}', '\App\Http\Controllers\UserController@show'); //某个人的主页
    Route::post('/{user}/fan', '\App\Http\Controllers\UserController@fan'); //关注某人
    Route::post('/{user}/unfan', '\App\Http\Controllers\UserController@unfan'); //取消关注某人
});

//专题
Route::get('/topic/{topic}', '\App\Http\Controllers\TopicController@show'); //专题页
Route::post('/topic/{topic}', '\App\Http\Controllers\TopicController@show'); //专题页


//后台管理
include_once ('admin.php');















//文章修改逻辑


//文章删除



//文章添加评论
Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostsController@comment');


//文章添加赞
Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostsController@zan');

//文章删除赞
Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostsController@unzan');