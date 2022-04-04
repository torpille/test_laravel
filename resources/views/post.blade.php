@extends('layout')
    @section('content')
        <article>
            <h1> {{ $post->title}} </h1>
            <div>{!! $post->body !!}</div>
            <a href="#">
                {{$post->category->name}}
            </a>
        </article>
        <a href="/">back</a>
    @endsection
