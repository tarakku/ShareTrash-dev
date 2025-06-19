<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment; // Commentモデルを使用
use App\Models\Post;    // Postモデルを使用
use App\Models\User;    // Userモデルを使用

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $users = User::all();

        if ($posts->isEmpty()) {
            echo "Warning: 投稿が見つかりません。先に PostTableSeeder を実行してください。\n";
            return;
        }
        if ($users->isEmpty()) {
            echo "Warning: ユーザーが見つかりません。先に UserTableSeeder を実行してください。\n";
            return;
        }

        Comment::create([
            'content' => 'この投稿、とても役に立ちました！ありがとうございます。',
            'posted_at' => now(),
            'post_id' => $posts->random()->post_id,
            'user_id' => $users->random()->id,
        ]);

        Comment::create([
            'content' => '私も同じ意見です。素晴らしい内容ですね！',
            'posted_at' => now()->subHours(1),
            'post_id' => $posts->random()->post_id,
            'user_id' => $users->random()->id,
        ]);

        Comment::create([
            'content' => '質問があります。この点について詳しく教えていただけますか？',
            'posted_at' => now()->subDays(1),
            'post_id' => $posts->random()->post_id,
            'user_id' => $users->random()->id,
        ]);

        Comment::create([
            'content' => '今後の更新も楽しみにしています！',
            'posted_at' => now()->subDays(2),
            'post_id' => $posts->random()->post_id,
            'user_id' => $users->random()->id,
        ]);

        Comment::create([
            'content' => '参考になりました！',
            'posted_at' => now()->subHours(3),
            'post_id' => $posts->random()->post_id,
            'user_id' => $users->random()->id,
        ]);
    }
}