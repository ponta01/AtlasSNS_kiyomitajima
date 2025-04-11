<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller

{

    public function profile()
    {
        $user = Auth::user();

    return view('profiles.profile', compact('user'));

    }



    public function update(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([

        'username' => ['required', 'string', 'min:2', 'max:12'],
        'email' => ['required', 'string', 'email', 'min:5', 'max:40'],
        'password' => ['required', 'regex:/^[a-zA-Z0-9]+$/', 'min:8', 'max:20', 'confirmed'],
        'bio' => ['string', 'max:150'],
        'icon_image' => ['nullable', 'image', 'mimes:bmp,png,jpg,gif,svg'],  ],[
            'username.min' => 'ユーザー名は2文字以上です。',
		    'username.max' => 'ユーザー名は12文字以下です。',
		    'email.min' => 'メールアドレスは5文字以上です。',
            'email.max' => 'メールアドレスは40文字以下です。',
            'password.min' => 'パスワードは8文字以上です。',
		    'password.max' => 'パスワードは20文字以下です。',
		    'bio.max' => '自己紹介は150文字以下です。',
        ]);

    // パスワードは必ずハッシュ化
    if ($request->filled('password'))
    {
        $validatedData['password'] = Hash::make($request->password);
    }

    // 画像アップロード処理
    if ($request->hasFile('icon_image'))
    {
        $path = $request->file('icon_image')->store('icon_images', 'public');
        $validatedData['icon_image'] = $path;
    }

    // ユーザー情報を更新
        $user->update($validatedData);

    return redirect('/top')->with('success', 'プロフィールが更新されました！');

    }

}
