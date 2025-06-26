<?php

namespace App\Http\Controllers\ShareTrash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\GuestUser;

class InquiryController extends Controller
{
    public function inquiryForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'content' => 'required|string'
        ]);

        //問い合わせインスタンス作成
        $inquiry = new Inquiry();
        $inquiry->email = $request->input('email');
        $inquiry->content = $request->input('content');

        //ユーザーかゲストか判定
        if (auth()->check()) {
            $inquiry->user_id = auth()->id();
        } else {
            $guest = GuestUser::firstOrCreate(
                ['session_id' => session()->getId()],
                ['email' => $request->input('email')]
            );
            $inquiry->guest_user_id = $guest->id;
        }
        $inquiry->save();

        return redirect()->back()->with('message', 'お問い合わせを送信しました。');
    }
}