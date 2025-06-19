<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'posted_at',
        'edited_at',
        'views_count',
        'likes_count',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'edited_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'post_id');
    }
}