@props(['name'])
@extends('layout')

@section('content')
    <span class="max-w-xl" >
        <h1 class="font-bold text-xl m-5 border-b-gray-300">{{$name}}</h1>
        <span class="flex">
            <aside class="w-48">
                <ul>
                    <h4 class="font-semibold mb-6">Links</h4>
                    <li>
                       <a href="../admin/posts/create"
                          class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}"
                       >Create a new post </a>
                    </li>
                    <li>
                       <a href="../admin/posts"
                          class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}"
                       >Manage Posts </a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                <x-card class="max-w-xxl" >
                    {{$slot}}
                </x-card>
            </main>
        </span>

    </span>
@endsection
