<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,     // ユーザーシーダーが一番最初に来るように
            CategoryTableSeeder::class, // その後、カテゴリ
            PostTableSeeder::class,     // その後、投稿
            CommentTableSeeder::class,  // 最後にコメント
        ]);
    }
}
