<?php

namespace App\Http\Controllers\ShareTrash;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * 投稿一覧（全体）
     */
    public function all(Request $request)
    {
        $allowedSorts = [
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

        $postsQuery->orderBy($allowedSorts[$sortBy], $sortDirection);

        $posts = $postsQuery->paginate(5);

        $categories = Category::all();

        return view('ShareTrash.allpost', compact('posts', 'categories', 'sortBy', 'sortDirection'));
    }

    /**
     * 投稿画面
     */
    public function create()
    {
        $categories = Category::all();
        return view('ShareTrash.create', compact('categories'));
    }

    /**
     * 投稿作成
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'posted_at' => Carbon::now(),
            'views_count' => 0,
            'likes_count' => 0,
        ]);

        return redirect()->route('posts.allpost')->with('success', '投稿が作成されました！');
    }

    /**
     * 投稿詳細
     */
    public function detail(string $id)
    {
        $post = Post::with('category')->findOrFail($id);

        return view('ShareTrash.detailpost', compact('post'));
    }

    /**
     * 投稿一覧（自身）
     */
    public function my(Request $request)
    {
        $user = Auth::user();
            
        $sortBy = $request->input('sort_by', 'posted_at');

        $posts = Post::where('user_id', $user->id)
                    ->orderBy($sortBy, 'desc')
                    ->paginate(10)
                    ->withQueryString();

        return view('ShareTrash.mypost', compact('posts', 'sortBy'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
