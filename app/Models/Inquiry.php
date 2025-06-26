<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    // テーブルの主キー名
    protected $primaryKey = 'inquiry_id';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'content',
        'status',
        'user_id',
        'guest_user_id',
        'inquired_at',
    ];

    protected $dates = [
        'inquired_at',
    ];

    // ログインユーザーとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ゲストユーザーとのリレーション
    public function guestUser()
    {
        return $this->belongsTo(GuestUser::class, 'guest_user_id');
    }
}