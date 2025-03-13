<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function search(Request $request){
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
        $users = User::where('title','like', '%'.$keyword.'%')->get();
        }else{
        $users = User::all();
        }
        // 3つ目の処理
        return view('users.search',['users'=>$users]);
    }

    // 編集フォームの表示
    public function edit($id)
    {
        $user = User::findOrFail($id); // ユーザーを取得
        return view('users.edit', compact('user'));
    }

    // 編集データの保存
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // ユニークチェック
            'profile_image' => 'nullable|image|max:2048', // 画像ファイルのバリデーション
        ]);

        // 画像の保存
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $validatedData['profile_image'] = $path;
        }
        // ユーザー情報の更新
        $user->update($validatedData);

        return redirect()->route('users.edit', $user->id)->with('success', 'プロフィールが更新されました。');
    }
}
