<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // public function index() {
    //     $users = User::get();// ユーザーテーブルから取得
    //     return view('users.search',['users'=>$users]);
    // }
    //
    public function search(Request $request){
        // キーワードを取得
        $keyword = $request->input('keyword');
        // 2つ目の処理
        $results = User::where('last_name', 'LIKE', "%{$keyword}%")
                   ->orWhere('first_name', 'LIKE', "%{$keyword}%")
                   ->orWhere('last_name_kana', 'LIKE', "%{$keyword}%")
                   ->orWhere('first_name_kana', 'LIKE', "%{$keyword}%")
                   ->get();
        // 3つ目の処理
        return view('users.search',['users'=>$users, 'username'=>$username]);
    }


    public function follow($id)
    {
        $follows = auth()->user();
        // ログインしている自分側
        $following = $follows->isFollowing($id);
        // フォローされる相手側
        if(!$following){
            $follows->follow($id);
        // ()の中がクリックしたときに指定されるid
        // もしフォローしていなかったら、followメソッドを呼び出してデータベースに指定したidのレコードを追加してください(フォローする)
        }
        // フォローされる相手側が
        return back ();
    }

    public function unfollow($id)
    {
        $follows = auth()->user();
        $following = $follows->isFollowing($id);
        if($following){
            $follows->unfollow($id);
        }
        return back ();
    }


}
