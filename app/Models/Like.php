<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $primaryKey = 'like_id';
    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
