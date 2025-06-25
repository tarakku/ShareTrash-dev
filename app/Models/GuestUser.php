<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    protected $fillable = [
        'session_id',
        'email',
    ];

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'guest_user_id');
    }
}