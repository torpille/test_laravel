@extends('layout')
    @section('content')
        @foreach ($posts as $post)
        <article>
            <a href="/posts/{{ $post->slug}} ">
                <h1> {{$post->title}} </h1>
            </a>
            {{ $post->excerpt }}
            <p><a href="/categories/{{$post->category->slug}}">
                {{$post->category->name}}
            </a></p>

        </article>

        @endforeach
    @endsection
