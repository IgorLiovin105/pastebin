<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', [PostController::class, 'index'])->name('homePage');

Route::get('/posts', [PostController::class, 'all'])->name('allPostsPage');

Route::get('/post/{slug}', [PostController::class, 'show'])->name('showPostPage');

Route::post('/post', [PostController::class, 'store'])->name('storePost')->middleware('auth');

Route::view('/login', 'login')->name('loginPage')->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

