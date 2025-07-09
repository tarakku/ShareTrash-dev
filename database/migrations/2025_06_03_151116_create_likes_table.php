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
        Schema::create('likes', function (Blueprint $table) {
            // 複合主キーの定義
            $table->bigIncrements('like_id');
            $table->foreignId('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreignId('post_id')
                  ->references('post_id')->on('posts')
                  ->onDelete('cascade');

            $table->unique(['user_id', 'post_id']); // 複合主キー

            $table->timestamps(); // いいねした日時などを記録する場合
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};