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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id('inquiry_id'); // PK: 問い合わせID
            $table->string('title'); // タイトル
            $table->text('content'); // 内容
            $table->timestamp('inquired_at')->useCurrent(); // 日時
            $table->string('status')->default('pending'); // 対応状況 (例: 'pending', 'resolved'など)

            // FK: 会員ID
            $table->foreignId('id')
                  ->constrained('users', 'id')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};