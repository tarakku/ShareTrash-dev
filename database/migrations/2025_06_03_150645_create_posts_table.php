<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');// PK: 投稿ID
            $table->string('title'); // タイトル
            $table->text('content'); // 内容
            $table->timestamp('posted_at')->useCurrent(); // 投稿日時
            $table->timestamp('edited_at')->nullable(); // 編集日時
            $table->integer('views_count')->default(0); // 閲覧数
            $table->integer('likes_count')->default(0); // いいね数
            $table->string('image_path')->nullable(); // 画像パス

            // FK: 会員ID
            $table->foreignId('user_id')
                  ->references('id')->on('users') // usersテーブルのidを参照
                  ->onDelete('cascade');

            // FK: カテゴリID
            $table->foreignId('category_id')
                  ->references('category_id')->on('categories') // categoriesテーブルのcategory_idを参照
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};