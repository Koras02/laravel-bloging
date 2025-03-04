<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::resource('posts', PostController::class);

// Post Comment Route
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get(uri: '/posts/create', action: [PostController::class, 'create'])->name('posts.create');
Route::Post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:admin']], function() {
    Route::get('/admin', [AdminController::class, 'index']);
});
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');

// 로그아웃 라우트
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');