<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' =>  Post::latest('created_at')->get(),
        'categories'=> Category::all()]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
//    find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post'=> $post,
        'categories'=> Category::all()]);

});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' =>  $category->posts,
        'currentCategory' => $category,
        'categories'=> Category::all()]);
});

Route::get('/authors/{author:username}', function (\App\Models\User $author) {
    return view('posts', [
        'posts' =>  $author->posts,
        'categories'=> Category::all()]);
});
