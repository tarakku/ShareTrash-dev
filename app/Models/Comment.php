<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primaryKey = 'comment_id'; // あなたの主キーを指定
    public $timestamps = false; // posted_at/edited_at を使うため、デフォルトのタイムスタンプは無効化

    protected $fillable = [
        'content',
        'posted_at',
        'edited_at',
        'post_id', // 外部キーカラムをfillableに追加
        'user_id',      // これはユーザーIDの外部キーです
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'edited_at' => 'datetime',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}