<?php

namespace App\Http\Controllers\ShareTrash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'address_prefecture' => 'required|string|max:255',
            'address_city' => 'required|string|max:255',
            // 他のプロフィール項目のルール
        ];

        if ($isChangingPassword) {
            $rules['current_password'] = ['required', 'current_password']; // 現在のパスワードが必須かつ正しいか
            $rules['new_password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        $validated = $request->validate($rules);

        // ここでユーザー情報を更新
        $user = auth()->user();
        $user->nickname = $request->input('nickname');
        $user->email = $request->input('email');
        $user->address_prefecture = $validated['address_prefecture'];
        $user->address_city = $validated['address_city'];
        
        // パスワード変更チェック
        if ($isChangingPassword) {
            // 新しいパスワードをハッシュ化して保存
            $user->password = Hash::make($request->input('new_password'));

        }
        $user->save();


        $message = '更新を保存しました。';


        if ($request->expectsJson()) {
            return response()->json([
                'message' => $message,
                'updated' => [
                    'nickname' => $user->nickname,
                    'email' => $user->email,
                    'address_prefecture' => $user->address_prefecture,
                    'address_city' => $user->address_city,
                ]
            ]);
        }
        // リダイレクト
        return redirect()->route('profile')->with('status', $message);
    }

}
