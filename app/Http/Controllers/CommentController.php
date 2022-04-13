<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post) {
        $attrs = request()->validate([
            'body'=>['required']]);
        $attrs['user_id'] = auth()->id();
        $attrs['post_id'] = $post->id;
        Comment::create($attrs);
        return back()->with('success', 'Your comment was added');
    }
}
