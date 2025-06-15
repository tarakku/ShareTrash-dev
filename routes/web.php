<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/ShareTrash/Category', [\App\Http\Controllers\ShareTrash\CategoryController::class, 'category'])->name('category');
Route::get('/ShareTrash/AllPost', [\App\Http\Controllers\ShareTrash\AllPostController::class, 'allpost_show'])->name('allpost');

Route::get('/ShareTrash/create', [\App\Http\Controllers\ShareTrash\PostController::class, 'create'])->name('create');

Route::post('/ShareTrash/create', [\App\Http\Controllers\ShareTrash\PostController::class, 'store'])->name('store');

Route::get('/ShareTrash/posts/{post}', [\App\Http\Controllers\ShareTrash\PostController::class, 'show'])->name('posts.show');