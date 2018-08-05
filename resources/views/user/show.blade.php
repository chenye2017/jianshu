@extends('layout.main')
@section('content')

        <div class="col-sm-8">
            <blockquote>
                <p><img src="{{$user->avatar}}" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
                </p>

            @include ('user.button.fan', ['target_user'=>$user])
                <footer>关注：{{$user->stars_count}}｜粉丝：{{$user->fans_count}}｜文章：{{$user->posts_count}}</footer>
            </blockquote>
        </div>
        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        @foreach($posts as $post)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a href="/user/{{$post->user_id}}">{{$post->user->name}}</a> {{$post->created_at->diffForHumans()}}</p>
                            <p class=""><a href="/posts/{{$post->id}}" >{{$post->title}}</a></p>


                            <p>{{$post->content}}</p>
                        </div>
                        @endforeach

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">

                        @foreach($stars as $star)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class="">{{$star->suser->name}}</p>
                            <p class="">关注：{{$star->suser->stars()->count()}} | 粉丝：{{$star->suser->fans()->count()}}｜ 文章：{{$star->suser->posts()->count()}}</p>

                            <div>
                                <button class="btn btn-default like-button" like-value="1" like-user="6" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">取消关注</button>
                            </div>

                        </div>
                        @endforeach

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">

                        @foreach($fans as $fan)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class="">{{$fan->fuser->name}}</p>
                                <p class="">关注：{{$fan->fuser->stars()->count()}} | 粉丝：{{$fan->fuser->fans()->count()}}｜ 文章：{{$fan->fuser->posts()->count()}}</p>

                                <div>
                                    <button class="btn btn-default like-button" like-value="1" like-user="6" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">取消关注</button>
                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>


        </div><!-- /.blog-main -->



       @endsection