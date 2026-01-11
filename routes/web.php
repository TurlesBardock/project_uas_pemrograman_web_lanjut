<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

// Public routes (BlogController)
Route::get('/', [BlogController::class, 'home'])->name('home');
Route::get('/about', [BlogController::class, 'about'])->name('about');
Route::get('/category/{category}', [BlogController::class, 'category'])->name('category');
Route::get('/article/{post}', [BlogController::class, 'show'])->name('post.show');

// Authentication routes (AuthController)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes - perlu login (PostController)
Route::middleware(['auth'])->group(function () {
    // Admin dashboard
    Route::get('/admin', [PostController::class, 'admin'])->name('admin.dashboard');

    // CRUD posts
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
