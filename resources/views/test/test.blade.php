{{--@extends('layout')

@section('test1')
    @parent
    lll
@stop--}}

<a href="{{route('test1')}}">test2
    <a href="{{url('/test/test2')}}">test2

@unless($name !== 'll')
    想等
@else
    不相等
@endunless
{{--

@include('test.test1', ['message'=>23])--}}
