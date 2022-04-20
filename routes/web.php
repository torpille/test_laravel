<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'retrieve'])->name('retrievePost');
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('storeComment')->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('registerStore')->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('loginStore')->middleware('guest');

Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('createPost')->middleware('admin');
Route::post('admin/posts/', [AdminPostController::class, 'store'])->name('storePost')->middleware('admin');
Route::get('admin/posts/', [AdminPostController::class, 'index'])->name('adminPosts');
Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit'])->name('adminPostEdit');
Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])->name('adminPostUpdate');
Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy'])->name('adminPostDelete');
