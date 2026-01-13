<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

// ========================
// PUBLIC (FRONTEND)
// ========================

Route::get('/', [BlogController::class, 'index']);
Route::get('/about', [BlogController::class, 'about'])->name('about');

// Category page
Route::get('/article/{post:slug}', [BlogController::class, 'show'])
    ->name('post.show');

Route::get('/category/{slug}', [CategoryController::class, 'show'])
    ->name('category.show');

// ========================
// AUTH
// ========================

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ========================
// ADMIN
// ========================

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [PostController::class, 'admin'])
        ->name('admin.dashboard');

    Route::get('/post/create', [PostController::class, 'create'])
        ->name('post.create');

    Route::post('/post', [PostController::class, 'store'])
        ->name('post.store');

    Route::get('/post/{post:slug}/edit', [PostController::class, 'edit'])
        ->name('post.edit');

    Route::put('/post/{post:slug}', [PostController::class, 'update'])
        ->name('post.update');

    Route::delete('/post/{post:slug}', [PostController::class, 'destroy'])
        ->name('post.destroy');
});
