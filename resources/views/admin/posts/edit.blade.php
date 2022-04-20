<x-setting :name="'Edit post:' . $post->title">
    <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data" class="block max-w-xl">
        @csrf
        @method("PATCH")
        <h1 class=" font-bold lg:text-center">Edit post</h1>
        <x-form.input name="title" value="{{$post->title}}" />
        <x-form.input name="slug" value="{{$post->slug}}" />
        <x-form.textarea name="excerpt">{{$post->excerpt}} </x-form.textarea>
        <x-form.textarea name="body">{{$post->body}} </x-form.textarea>

        <x-form._field>
            <x-form._label name="category_id" />
            @php
                $categories = App\Models\Category::all()
            @endphp

            <select name="category_id" id="category_id" class="block w-full">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                    {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                    >{{$category->name}}</option>
                @endforeach
            </select>
            <x-form._error name="category_id"/>
        </x-form._field>
        <div class="flex">
            <x-form.input name="thumbnail" type="file"  />
            <img src="{{asset('/storage/'. $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl m-5" width="100">
        </div>

        <x-form.button>Submit</x-form.button>
    </form>
</x-setting>


