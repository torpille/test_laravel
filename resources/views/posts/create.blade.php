@extends('layout')

@section('content')
<x-card>
    <form method="POST" action="admin/posts/create">
        @csrf
        <h1 class=" font-bold lg:text-center">Add post</h1>
        <div class="m-5">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="title">
                Title
            </label>
            <input class="border border-gray-300 p-2 w-full"
                   type="text"
                   name="title"
                   id="title"
                   value="{{old('title')}}"
                   required>
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="m-5">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="username">
                Body
            </label>
            <textarea
                name="body"
                id="body"
                class="w-full p-5 focus:outline-none focus:ring"
                cols="20"
                rows="5"
                required>
            </textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="m-5 flex justify-end" >
            <button type="submit"
                    class="bg-blue-400 rounded margin-5 p-2 text-white font-bold hover:bg-blue-500"
            >Send</button>
        </div>
    </form>
</x-card>
@endsection
