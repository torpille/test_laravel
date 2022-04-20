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


}
