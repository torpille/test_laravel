
@extends('layout')

@section('content')
<x-card class="max-w-sm" >
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
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
            <label class="block mb-2 font-bold text-xs text-gray-700" for="slug">
                Slug
            </label>
            <input class="border border-gray-300 p-2 w-full"
                   type="text"
                   name="slug"
                   id="slug"
                   value="{{old('slug')}}"
                   required>
            @error('slug')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="m-5">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="excerpt">
                Excerpt
            </label>
            <textarea
                name="excerpt"
                id="excerpt"
                class="w-full p-5 focus:outline-none focus:ring  border border-gray-300"
                cols="20"
                rows="5"
                required>
            </textarea>
            @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="m-5 ">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="body">
                Body
            </label>
            <textarea
                name="body"
                id="body"
                class="w-full p-5 focus:outline-none focus:ring  border border-gray-300"
                cols="20"
                rows="5"
                required>
            </textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="m-5 ">
            <label class="block mb-2 font-bold text-xs text-gray-700" for="category_id">
                Category
            </label>
            @php
                $categories = App\Models\Category::all()
            @endphp

            <select name="category_id" id="category_id" class="block w-full">
            @foreach($categories as $category)
                <option value="{{$category->id}}" >{{$category->name}}</option>
            @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <input class="border border-gray-300 p-2 w-full"
               type="file"
               name="thumbnail"
               id="thumbnail"/>

                @error('thumbnail')
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
