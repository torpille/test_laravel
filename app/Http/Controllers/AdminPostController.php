<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminPostController extends Controller
{
    public function index() {
        $posts = Post::latest('created_at');

        return view('admin.posts.index', [
            'posts' =>  $posts->filter(['author'=>request()->user()])->paginate(10)->withQueryString(),
        ]);
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store() {
        $attrs = $this->validatePost();
        $attrs['user_id'] = auth()->id();
        $attrs['thumbnail'] = request()->file('thumbnail')->store('thumbnails', ['disk'=>'public']);
        $post = Post::create($attrs);
        $path = join(['/posts/', $post->slug]);
        return redirect($path)->with('success', 'Post has been created');
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function update(Post $post) {
        $attrs = $this->validatePost($post);
        if (request()->file('thumbnail')) {
            $attrs['thumbnail'] = request()->file('thumbnail')->store('thumbnails', ['disk'=>'public']);}
        $post->update($attrs);
        $path = join(['/posts/', $post->slug]);
        return redirect($path)->with('success', 'Post has been created');
    }

    public function destroy(Post $post) {
        $post->delete();
        return back(204)->with('success', 'Post has been deleted');
    }

    private function validatePost(Post $post = null) {
        $post = $post ??= new Post();
        return request()->validate([
            "title"=>[ 'max:255', 'min:2'],
            "body"=>['required'],
            "excerpt"=>['required'],
            "thumbnail"=>['image'],
            "slug"=>['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            "category_id"=>['required', Rule::exists('categories', 'id')],
        ]);

    }
}
