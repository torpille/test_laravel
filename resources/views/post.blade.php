@extends('layout')
    @section('content')
        <article>
            <h1> {{ $post->title}} </h1>
            <div>{!! $post->body !!}</div>
            <p><a href="/categories/{{$post->category->slug}}"> {{$post->category->name}}</a></p>
        </article>
        <a href="/">back</a>
    @endsection
