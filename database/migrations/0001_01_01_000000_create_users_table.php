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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //id を主キーとして定義
            $table->string('password');
            $table->string('nickname')->unique();
            $table->string('email')->unique();
            $table->string('address_prefecture')->nullable();
            $table->string('address_city')->nullable();
            $table->boolean('is_admin')->default(false);
            // Laravel認証に必要なカラム
            // メールアドレス認証日時 (Breezeのメール認証機能を使うなら必須)
            $table->timestamp('email_verified_at')->nullable();
            // ログイン状態維持トークン (Breezeの「ログイン状態を維持する」機能を使うなら必須)
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
