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
            $table->bigIncrements('inquiry_id'); // PK: 問い合わせID
            $table->string('email'); // メールアドレス
            $table->text('content'); // 内容
            $table->timestamp('inquired_at')->useCurrent(); // 日時
            $table->string('status')->default('未対応'); // 対応状況 (例: '未対応', '対応中','対応済み')

            // FK: ログインユーザーID
            $table->foreignId('user_id')->nullable()
                  ->constrained(table: 'users', column: 'id')
                  ->onDelete('cascade');
        
            // FK: ゲストユーザーID
            $table->foreignId('guest_user_id')->nullable()
                  ->constrained(table: 'guest_users', column: 'id')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropForeign('inquiries_user_id_foreign');
            $table->dropForeign('inquiries_guest_user_id_foreign'); 
        });
        Schema::dropIfExists('inquiries');
    }
};