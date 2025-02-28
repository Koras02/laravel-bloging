<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::resource('posts', PostController::class);

// Post Comment Route
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get(uri: '/posts/create', action: [PostController::class, 'create'])->name('posts.create');
Route::Post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');