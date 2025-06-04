<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post; //Postモデルをuse
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'テストデータ',
            'content' => 'これはシーダーで作成された最初の投稿です',
            'posted_at' => now(), // 現在時刻
            'views_count' => 10,
            'likes_count' => 5,
        ]);

        Post::create([
            'title' => '2番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(2), // 2日前の日付
            'views_count' => 25,
            'likes_count' => 12,
        ]);

        Post::create([
            'title' => '3番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(3), // 3日前の日付
            'views_count' => 20,
            'likes_count' => 12,
        ]);

        Post::create([
            'title' => '4番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(4), // 4日前の日付
            'views_count' => 10,
            'likes_count' => 12,
        ]);

        Post::create([
            'title' => '5番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(5), // 5日前の日付
            'views_count' => 1,
            'likes_count' => 1,
        ]);

        Post::create([
            'title' => '6番目の投稿',
            'content' => 'シーダーを使ったダミーデータの挿入テストです。',
            'posted_at' => now()->subDays(6), // 6日前の日付
            'views_count' => 6,
            'likes_count' => 6,
        ]);
    }
}
