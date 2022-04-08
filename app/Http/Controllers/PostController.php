<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest('created_at');

        return view('posts', [
            'posts' =>  $posts->filter(request(['search']))->get(),
            'categories'=> Category::all(),
            'currentCategory'=> Category::firstWhere('slug', request('category'))
        ]);
    }

    public function retrieve(Post $post) {
        return view('post', [
            'post'=> $post,
            'categories'=> Category::all()]);
    }
}
