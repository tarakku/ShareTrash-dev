<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User; // Userモデルをuseする
use App\Models\Category; // Categoryモデルをuseする

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データを挿入する前に、参照先のユーザーとカテゴリが存在することを確認または作成
        // DatabaseSeeder.phpでUserTableSeederとCategoryTableSeederが先に実行されることを前提とします。

        // 投稿の作成者となるユーザーを取得
        $user = User::first(); // 最初のユーザーを取得
        if (!$user) {
            // ユーザーがいない場合、ダミーを作成するかエラーを出す
            // ここでFactoryを使うのが最も堅牢です
            $user = User::factory()->create(); // UserFactoryがある場合
            // あるいは、エラーメッセージを表示してシーダーを停止
            // echo "Warning: ユーザーが見つかりません。UserTableSeederを先に実行してください。\n";
            // return;
        }

        // 投稿のカテゴリを取得
        $category = Category::first(); // 最初のカテゴリを取得
        if (!$category) {
            // カテゴリがいない場合、ダミーを作成するかエラーを出す
            $category = Category::factory()->create(); // CategoryFactoryがある場合
            // あるいは、エラーメッセージを表示してシーダーを停止
            // echo "Warning: カテゴリが見つかりません。CategoryTableSeederを先に実行してください。\n";
            // return;
        }

        // ここからPost::create()の各呼び出しに user_id と category_id を追加
        Post::create([
            'title' => 'テストデータ',
            'content' => 'これはシーダーで作成された最初の投稿です',
            'posted_at' => now(), // 現在時刻
            'views_count' => 10,
            'likes_count' => 5,
            'user_id' => $user->id,          // ★ここを追加または修正★
            'category_id' => $category->category_id, // ★ここを追加または修正★
        ]);

        Post::create([
            'title' => '2番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(2), // 2日前の日付
            'views_count' => 25,
            'likes_count' => 12,
            'user_id' => $user->id,
            'category_id' => $category->category_id,
        ]);

        Post::create([
            'title' => '3番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(3), // 3日前の日付
            'views_count' => 20,
            'likes_count' => 12,
            'user_id' => $user->id,
            'category_id' => $category->category_id,
        ]);

        Post::create([
            'title' => '4番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(4), // 4日前の日付
            'views_count' => 10,
            'likes_count' => 12,
            'user_id' => $user->id,
            'category_id' => $category->category_id,
        ]);

        Post::create([
            'title' => '5番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(5), // 5日前の日付
            'views_count' => 1,
            'likes_count' => 1,
            'user_id' => $user->id,
            'category_id' => $category->category_id,
        ]);

        Post::create([
            'title' => '6番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(6), // 6日前の日付
            'views_count' => 6,
            'likes_count' => 6,
            'user_id' => $user->id,
            'category_id' => $category->category_id,
        ]);
    }
}