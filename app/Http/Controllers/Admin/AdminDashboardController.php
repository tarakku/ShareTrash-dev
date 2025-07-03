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

        //　表示用プロパティ
        foreach ($inquiries as $inquiry) {
            if (is_null($inquiry->user_id)) {
                $inquiry->display_name = 'ゲスト';
            } elseif (is_null($inquiry->guestID)) {
                // ユーザー名（リレーションがあれば）
                $inquiry->display_name = optional($inquiry->user)->nickname ?? 'ユーザー';
            } else {
                $inquiry->display_name = $inquiry->guestID;
            }
        }
        
        return view('admin.dashboard', compact('posts', 'users', 'stats','inquiries'));
    }
}
