
@extends('layout')

@section('content')
<x-card class="max-w-sm" >
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
        @csrf
        <h1 class=" font-bold lg:text-center">Add post</h1>
        <x-form.input name="title"/>
        <x-form.input name="slug"/>
        <x-form.textarea name="excerpt"/>
        <x-form.textarea name="body"/>

        <x-form._field>
            <x-form._label name="category_id" />
            @php
                $categories = App\Models\Category::all()
            @endphp

            <select name="category_id" id="category_id" class="block w-full">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>
            <x-form._error name="category_id"/>
        </x-form._field>

        <x-form.input name="thumbnail" type="file"/>
        <x-form.button>Submit</x-form.button>
    </form>
</x-card>
@endsection
