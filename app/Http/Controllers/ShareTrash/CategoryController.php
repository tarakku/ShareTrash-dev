<?php

namespace App\Http\Controllers\ShareTrash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(){
         return view('ShareTrash.category');
    }

    public function show(Request $request, $name)
    {
        // セッションに現在のURLを保存
        session(['return_to' => $request->fullUrl()]);

        $category = Category::where('category_name', $name)->firstOrFail();

        $posts = $category->posts;

        return view('ShareTrash.categories', compact('posts', 'name'));
    }
}
