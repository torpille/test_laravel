<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function store(Post $post) {
        $attrs = request()->validate([
            'body'=>['required']]);
        if (! $attrs) {
            throw ValidationException::withMessages(['body' => 'Write something to add a comment']);
        }
        $user_id = auth()->id();
        if (! $user_id) {
            throw ValidationException::withMessages(['Log in or register']);
        }
        $attrs['user_id'] = $user_id;
        $attrs['post_id'] = $post->id;
        Comment::create($attrs);
        return back()->with('success', 'Your comment was added');
    }
}
