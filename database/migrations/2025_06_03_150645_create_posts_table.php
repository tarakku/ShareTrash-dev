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
            $table->id('post_id'); // PK: 投稿ID
            $table->string('title'); // タイトル
            $table->text('content'); // 内容 (stringではなくtextの方が適切)
            $table->timestamp('posted_at')->useCurrent(); // 投稿日時
            $table->timestamp('edited_at')->nullable(); // 編集日時
            $table->integer('views_count')->default(0); // 閲覧数 (view は予約語と被る可能性があるので変更)
            $table->integer('likes_count')->default(0); // いいね数 (like も予約語と被る可能性があるので変更)

            // FK: 会員ID
            $table->foreignId('id')
                  ->constrained('users', 'id') // usersテーブルのidを参照
                  ->onDelete('cascade');

            // FK: カテゴリID
            $table->foreignId('category_id')
                  ->constrained('categories', 'category_id') // categoriesテーブルのcategory_idを参照
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