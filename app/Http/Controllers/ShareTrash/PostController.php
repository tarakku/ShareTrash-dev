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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('ShareTrash.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
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

        return redirect()->route('allpost')->with('success', '投稿が作成されました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('category')->findOrFail($id);

        return view('ShareTrash.show', compact('post'));
    }


    public function myPosts(Request $request)
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
