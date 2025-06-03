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
        Schema::create('views', function (Blueprint $table) {
            // 複合主キーの定義
            $table->foreignId('id')
                  ->constrained('users', 'id')
                  ->onDelete('cascade');
            $table->foreignId('post_id')
                  ->constrained('posts', 'post_id')
                  ->onDelete('cascade');

            $table->primary(['id', 'post_id']); // 複合主キー

            $table->timestamp('viewed_at')->useCurrent(); // 閲覧日時
            // $table->timestamps(); // もしupdated_atも必要なら
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('views');
    }
};