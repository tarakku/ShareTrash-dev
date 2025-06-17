<?php

namespace App\Http\Controllers\ShareTrash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('ShareTrash.profile');
    }
}
