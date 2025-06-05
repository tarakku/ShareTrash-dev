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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id'); // PK: コメントID
            $table->text('content'); // 内容 (stringではなくtextの方が適切)
            $table->timestamp('posted_at')->useCurrent(); // 投稿日時
            $table->timestamp('edited_at')->nullable(); // 編集日時

            // FK: 投稿ID
            $table->foreignId('post_id')
                  ->constrained('posts', 'post_id') // postsテーブルのpost_idを参照
                  ->onDelete('cascade');

            // FK: 会員ID
            $table->foreignId('user_id')
                  ->constrained('users', 'id') // usersテーブルのidを参照
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};