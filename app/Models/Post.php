<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $primarkey = 'post_id';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'posted_at',
        'edited_at',
        'views_count',
        'likes_count',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'edited_at' => 'datetime',
    ];
}
