<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ShareTrash\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/', [\App\Http\Controllers\ShareTrash\CategoryController::class, 'category'])->name('category');

Route::get('/Profile', [\App\Http\Controllers\ShareTrash\ProfileController::class, 'profile'])->name('profile');

Route::get('/AllPost', [PostController::class, 'all'])->name('posts.allpost');

Route::get('/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/create', [PostController::class, 'store'])->name('posts.store');

Route::middleware('auth')->group(function () {
Route::get('/posts/{post}', [PostController::class, 'detail'])->name('posts.detail');
});

Route::get('/MyPost', [PostController::class, 'my'])->name('posts.my');