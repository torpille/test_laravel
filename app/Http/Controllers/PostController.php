<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest('created_at');

        return view('posts.index', [
            'posts' =>  $posts->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString(),
        ]);
    }

    public function retrieve(Post $post) {
        return view('posts.retrieve', [
            'post'=> $post
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $attrs = request()->validate([
            "title"=>['required', 'max:255', 'min:2'],
            "body"=>['required'],
            "excerpt"=>['required'],
            "thumbnail"=>['image'],
            "slug"=>['required', Rule::unique('posts', 'slug')],
            "category_id"=>['required', Rule::exists('categories', 'id')],
        ]);
        $attrs['user_id'] = auth()->id();
        $attrs['thumbnail'] = request()->file('thumbnail')->store('thumbnails', ['disk'=>'public']);
        $post = Post::create($attrs);
        $path = join(['/posts/', $post->slug]);
        return redirect($path)->with('success', 'Post has been created');
    }
}
