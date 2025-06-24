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

    public function update(Request $request)
    {
        // パスワード変更の入力があるかチェック
        $isChangingPassword = $request->filled('current_password') || $request->filled('new_password') || $request->filled('new_password_confirmation');

        // バリデーションルール設定
        $rules = [
            'nickname' => 'required|string|max:255',
            'email' => 'required|email',
            // 他のプロフィール項目のルール
        ];

        if ($isChangingPassword) {
            $rules['current_password'] = ['required', 'current_password']; // 現在のパスワードが必須かつ正しいか
            $rules['new_password'] = ['required', 'string', 'min:8', 'confirmed']; // 確認フィールドは new_password_confirmation
        }

        $validated = $request->validate($rules);

        // ここでユーザー情報を更新

        // パスワード変更があれば更新
        if ($isChangingPassword) {
            $user = auth()->user();
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
        }

        // リダイレクトなど
        return redirect()->route('profile')->with('status', 'プロフィールを更新しました。');
    }
}
