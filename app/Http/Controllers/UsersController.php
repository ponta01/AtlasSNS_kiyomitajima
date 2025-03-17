<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::get();// ユーザーテーブルから取得
        // \Debugbar::info($users);
        return view('users.search',['users'=>$users]);
    }
    //
    public function search(Request $request){
        // 1つ目の処理
        $username = $request->input('username');
        // 2つ目の処理
        if(!empty($username)){
        $users = User::where('username','like', '%'.$username.'%')->get();
        }else{
        $users = User::all();
        }
        // 3つ目の処理
        return view('users.search',['users'=>$users, 'username'=>$username]);
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
            'username' => ['required', 'string', 'min:2', 'max:12'],
            'email' => ['required', 'string', 'email', 'min:5', 'max:40'],
            'newpassword' => ['required', 'regex:/^[a-zA-Z0-9]+$/','min:8', 'max:20', 'confirmed'],
            'newpassword_confirmation' => ['required', 'regex:/^[a-zA-Z0-9]+$/','min:8', 'max:20', 'confirmed','same:newpassword'],
            'bio' => ['required', 'string', 'max:150'],
            'icon_image' => ['required', 'image', 'bmp,png,jpg,gif,svg'],
        ]);

        // 画像の保存
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $validatedData['profile_image'] = $path;
        }
        // ユーザー情報の更新
        $user->update($validatedData);

        return redirect()->route('users.index', $user->id)->with('success', 'プロフィールが更新されました。');
    }


}
