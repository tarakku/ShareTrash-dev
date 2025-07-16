<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ShareTrash\PostController;
use App\Http\Controllers\ShareTrash\CommentController;
use App\Http\Controllers\ShareTrash\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ShareTrash\InquiryController;

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

Route::get('/mypage_or_login',function(){
    if (auth()->check()) {
        return redirect()->route('profile');
    } else {
        return redirect()->route('login', ['redirect_to' => url()->previous()]);
    }
})->name('mypage_or_login');

Route::get('/', [\App\Http\Controllers\ShareTrash\CategoryController::class, 'category'])->name('category');

Route::get('/profile', [\App\Http\Controllers\ShareTrash\ProfileController::class, 'profile'])->name('profile');

Route::get('/category/{name}', [CategoryController::class, 'show'])->name('category.show');

Route::patch('/myprofile', [\App\Http\Controllers\ShareTrash\ProfileController::class, 'update'])->name('myprofile.update');

Route::get('/AllPost', [PostController::class, 'all'])->name('posts.allpost');

Route::get('/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/create', [PostController::class, 'store'])->name('posts.store');

Route::post('/inquiry',[InquiryController::class, 'inquiryForm'])->name('inquiry.form');

Route::middleware('auth')->group(function () {
   
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('posts.comments.store');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])
    ->middleware('auth')
    ->name('posts.like');

    Route::get('/MyPost', [PostController::class, 'my'])->name('posts.my');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

});

Route::get('/posts/{post}', [PostController::class, 'detail'])->name('posts.detail');

// Ajaxリクエストで投稿一覧を更新するためのルート
Route::get('/AllPost/refresh', [\App\Http\Controllers\ShareTrash\PostController::class, 'refresh'])->name('posts.refresh');

// Ajaxリクエストで管理者ページのデータを更新するためのルート
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/refresh-posts', [AdminDashboardController::class, 'refreshPosts'])->name('refresh.posts');
    Route::get('/refresh-users', [AdminDashboardController::class, 'refreshUsers'])->name('refresh.users');
    Route::get('/refresh-inquiries', [AdminDashboardController::class, 'refreshInquiries'])->name('refresh.inquiries');
    Route::get('/refresh-stats', [AdminDashboardController::class, 'refreshStats'])->name('refresh.stats');
});

// コメント機能
Route::get('/posts/{post}/comments/refresh', [CommentController::class, 'refresh'])->name('posts.comments.refresh');