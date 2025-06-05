<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Userモデルをuseする
use Illuminate\Support\Facades\Hash; // パスワードハッシュ化のためにHashファサードを使う

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 既存のデータを全て削除してから挿入する場合（開発時に便利）
        // User::truncate(); // 全レコードを削除。PKの自動インクリメントもリセットしたい場合は下記
        // DB::table('users')->truncate(); // DBファサードを使う場合

        // テストユーザーを作成
        User::create([
            'nickname' => 'テストユーザー', // nickname を使用
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // パスワードはハッシュ化
            'email_verified_at' => now(), // メール認証済みに設定
            'address_prefecture' => '東京都',
            'address_city' => '新宿区',
        ]);

        User::create([
            'nickname' => '管理者',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'address_prefecture' => '大阪府',
            'address_city' => '大阪市',
        ]);

        User::create([
            'nickname' => 'ゲストユーザー',
            'email' => 'guest@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => null, // メール未認証として設定
            'address_prefecture' => null, // 住所はnullableなので、nullでもOK
            'address_city' => null,
        ]);


        // 大量のダミーデータが必要な場合はFactoryを使用するのが最適です
        // 1. UserFactoryを作成: php artisan make:factory UserFactory --model=User
        // 2. UserFactoryを編集してダミーデータを生成するロジックを記述
        // 3. ここで呼び出す: User::factory()->count(10)->create(); // 10人のダミーユーザーを作成
    }
}