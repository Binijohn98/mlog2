<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function(){

    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create'); 
});