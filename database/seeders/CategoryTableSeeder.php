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
            'category_name' => '燃えるゴミ',
        ]);

        Category::create([
            'category_name' => '燃えないゴミ',
        ]);

        Category::create([
            'category_name' => 'プラスチック',
        ]);

        Category::create([
            'category_name' => 'カン',
        ]);

        Category::create([
            'category_name' => 'ビン',
        ]);
    }
}
