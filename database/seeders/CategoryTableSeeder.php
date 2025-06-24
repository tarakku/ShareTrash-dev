<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Categoryモデルをuse

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name' => '燃えるごみ',
        ]);

        Category::create([
            'category_name' => '不燃ごみ',
        ]);

        Category::create([
            'category_name' => 'インクカートリッジ',
        ]);

        Category::create([
            'category_name' => 'カン',
        ]);

        Category::create([
            'category_name' => 'キャップ',
        ]);

        Category::create([
            'category_name' => 'ケーブル類',
        ]);

        Category::create([
            'category_name' => 'トレー',
        ]);

        Category::create([
            'category_name' => 'ビン',
        ]);

        Category::create([
            'category_name' => 'ペットボトル',
        ]);

        Category::create([
            'category_name' => '牛乳パック',
        ]);

        Category::create([
            'category_name' => '衣類',
        ]);

        Category::create([
            'category_name' => '金属製品',
        ]);

        Category::create([
            'category_name' => '小型製品',
        ]);

        Category::create([
            'category_name' => '新聞紙',
        ]);

        Category::create([
            'category_name' => '電池',
        ]);
    }
}
