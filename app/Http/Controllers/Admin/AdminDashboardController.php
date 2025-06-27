<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Inquiry;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::all();
        $posts = Post::all();
        $users = User::all();
        $comments = Comment::all();
        $stats = [
            'post_count' => $posts->count(),
            'user_count' => $users->count(),
            'comment_count' => $comments->count(),
        ];
        return view('admin.dashboard', compact('posts', 'users', 'stats','inquiries'));
    }
}
