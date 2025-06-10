<?php

namespace App\Http\Controllers\ShareTrash;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Request クラスを忘れずにuseします

class AllPostController extends Controller
{
    /**
     * 投稿の一覧を表示します。
     * 必要に応じて、特定のカテゴリの投稿を絞り込みます。
     */
    public function allpost(Request $request) // ここに Request $request を追加します
    {
        // 投稿の基本クエリを定義します
        $postsQuery = Post::with('category')->orderBy('posted_at', 'desc');

        // URLに 'category_id' パラメータがある場合、そのカテゴリIDで絞り込む
        if ($request->has('category_id')) {
            $categoryId = $request->input('category_id');
            // postsテーブルの category_id カラムで絞り込みます
            $postsQuery->where('category_id', $categoryId);
        }

        // 定義されたクエリを実行して投稿を取得
        $posts = $postsQuery->get(); 

        // 全てのカテゴリ一覧も取得 (これは絞り込みには関係ありません)
        $categories = Category::all(); 

        return view('ShareTrash.allpost', compact('posts', 'categories'));
    }
}