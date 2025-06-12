<?php

namespace App\Http\Controllers\ShareTrash;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Request クラスを忘れずにuseします

class AllPostController extends Controller
{
    /**
     * 一覧表示処理 ソート含む
     */
    public function allpost_show(Request $request)
    {
        $allowedSorts = [
            'created_at' => 'created_at',
            'views_count' => 'views_count',
            'likes_count' => 'likes_count',
            'posted_at' => 'posted_at',
        ];

        $sortBy = $request->query('sort_by', 'posted_at');
        $sortDirection = $request->query('direction', 'desc');

        if (!array_key_exists($sortBy, $allowedSorts)) {
            $sortBy = 'posted_at';
        }

        if (!in_array(strtolower($sortDirection), ['asc', 'desc'])) {
            $sortDirection = 'desc';
        }

        $postsQuery = Post::query();

        $postsQuery->with('category');

        if ($request->has('category_id')) {
            $categoryId = $request->input('category_id');
            $postsQuery->where('category_id', $categoryId);
        }

        if ($sortBy === 'likes_count') {
            $postsQuery->withCount('likes');
        }

        $postsQuery->orderBy($allowedSorts[$sortBy], $sortDirection);

        $posts = $postsQuery->paginate(10);

        $categories = Category::all();

        return view('ShareTrash.allpost', compact('posts', 'categories', 'sortBy', 'sortDirection'));
    }

}