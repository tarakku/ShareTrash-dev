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
            $table->id('comment_id');
            $table->text('content');
            $table->timestamp('posted_at')->useCurrent();
            $table->timestamp('edited_at')->nullable();

            // FK: 投稿ID
            $table->foreignId('post_id')
                  ->references('post_id')->on('posts')
                  ->onDelete('cascade');

            // FK: 会員ID
            $table->foreignId('user_id')
                  ->references('id')->on('users')
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