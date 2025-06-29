<?php

namespace App\Http\Controllers\ShareTrash;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
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
        // セッションに現在のURLを保存
        session(['return_to' => $request->fullUrl()]);

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
        $postsQuery->with('category')->withCount('comments');

        // 検索機能
        if ($request->filled('search')) {
            $search = $request->input('search');
            $postsQuery->where(function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->has('category_id')) {
            $categoryId = $request->input('category_id');
            $postsQuery->where('category_id', $categoryId);
        }

        $postsQuery->orderBy($allowedSorts[$sortBy], $sortDirection);
        $posts = $postsQuery->paginate(5)->appends($request->query());

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

    $redirectUrl = session('return_to', route('posts.allpost'));

    return redirect($redirectUrl)->with('success', '投稿が完了しました。');
    }

    /**
     * 投稿詳細
     */
    public function detail(string $id)
    {
        $post = Post::with(['category', 'comments'])->findOrFail($id);

        //セッションキーを作成
        $sessionkey = 'viewed_post_' . $post->post_id;
        $expire = 10 * 60;

        //セッションに記録がなければ閲覧数を+1する
        if(!session() ->has($sessionkey)) {
            $post -> increment('views_count');
            session() -> put($sessionkey, true);
            session() -> put($sessionkey . '_time', now() -> timestamp);
        } else {
            //セッションに記録があれば、閲覧数を+1しない
            $lastTime = session($sessionkey . '_time' , 0);
            if(now()->timestamp - $lastTime > $expire) {
                $post->increment('views_count');
                session()->put($sessionkey . '_time', now()->timestamp);
            }
        }
        return view('ShareTrash.detailpost', compact('post'));
    }

    /**
     * 投稿一覧（自身）
     */
    public function my(Request $request)
    {
        // セッションに現在のURLを保存
        session(['return_to' => $request->fullUrl()]);

        $user = Auth::user();
        $sortBy = $request->input('sort_by', 'posted_at');

        // 検索機能を含めたクエリビルダを作成
        $postsQuery = Post::where('user_id', $user->id);
        if ($request->filled('search')) {
            $search = $request->input('search');
            $postsQuery->where(function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $postsQuery
                    ->orderBy($sortBy, 'desc')
                    ->paginate(5)
                    ->withQueryString();

        return view('ShareTrash.mypost', compact('posts', 'sortBy'));
    }
    /**
     * 編集画面を表示
     */
    public function edit(Post $post)
    {
       // dd($post);
        $categories = Category::all();
        return view('ShareTrash.edit', compact('post', 'categories'));
    }

    /**
     * 投稿を更新
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request ->category_id,
        ]);

        $redirectUrl = session('return_to', route('posts.my'));

        return redirect($redirectUrl)->with('success', '投稿の更新完了しました。');
    }

    /**
     * 投稿削除
     */
    public function destroy(Post $post)
    {
        $post->delete();

        $redirectUrl = session('return_to', route('posts.my'));

        return redirect($redirectUrl)->with('success', '投稿の削除完了しました。');
    }

    /**
     * いいね
     */
    public function like(Request $request, Post $post)
    {
        $user = Auth::user();

        // 既にいいねしているか確認
        $like = \App\Models\Like::where('user_id', $user->id)
                        ->where('post_id', $post->post_id)
                        ->first();
        if ($like) {
            $like->delete(); // いいねを削除
            $post->decrement('likes_count'); // -1する
            return back()->with('success', 'いいねを取り消しました。');
        }else {
            // いいねを保存
            \App\Models\Like::create([
                'user_id' => $user->id,
                'post_id' => $post->post_id,
            ]);

            $post->increment('likes_count'); // +1する

            return back()->with('success', 'いいねしました！');
        }
    }
}
