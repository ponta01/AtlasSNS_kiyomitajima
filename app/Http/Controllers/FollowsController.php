<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
    public function followUser(Request $request)
    {
        $followingId = Auth::id(); // フォローするユーザー（ログイン中のユーザー）のID
        $followedId = $request->input('followed_id'); // フォローされるユーザーのID

        // 自分自身をフォローしないようにするチェック
        if ($followingId == $followedId) {
            return back()->with('error', '自分自身をフォローすることはできません。');
        }

        // フォロー関係がすでに存在しない場合のみ作成
        $exists = Follow::where('following_id', $followingId)
                        ->where('followed_id', $followedId)
                        ->exists();

        if (!$exists) {
            Follow::create([
                'following_id' => $followingId,
                'followed_id' => $followedId,
            ]);
            return back()->with('success', 'フォローしました！');
        }

        return back()->with('info', '既にフォローしています。');
    }
}
