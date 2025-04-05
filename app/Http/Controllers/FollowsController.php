<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // For using the Auth facade
use App\Models\Post;
use App\Models\User;


class FollowsController extends Controller
{
    //
    public function followList(){
        $users = User:: whereIn('id',Auth::user()->follows()->pluck('followed_id'))->get();
        // 'id'は比較対象となるテーブルのカラム名。その後のAuth以降はカラムの値として一致させたい配列。
        // pluckは配列で取得(ログインユーザーのフォローしている人を配列にまとめる)引数にカラムの値をいれる。
        // dd(Auth::user()->follows()->pluck('followed_id'));
        $following_id=$users->pluck('id');
        // idを取得しないと投稿の一覧を取得できないため
        $posts= Post:: whereIn('user_id', $following_id)->with('user')->orderBy('created_at', 'desc')->get();
        // withを使うと、リレーションのメソッド名に関連した情報をデータベースから持ってきてくれる
        return view('follows.followList',compact('users','posts'));
        // compactはphpの組み込み関数。指定した変数をキーとする連想配列を作成する
        // viewにデータを渡したいときによく使われる関数
    }

    public function followerList(){
        $users = User:: whereIn('id',Auth::user()->followers()->pluck('following_id'))->get();
        $followed_id=$users->pluck('id');
        $posts= Post:: whereIn('user_id', $followed_id)->with('user')->orderBy('created_at', 'desc')->get();
        return view('follows.followerList',compact('users','posts'));
    }

    public function userProfile($id){
        $users = User::where('id', $id)->get();
        // idを取得しないと投稿の一覧を取得できないため
        $posts= Post:: where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('users.userProfile',compact('users','posts'));
    }


}
