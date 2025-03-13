<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Postモデルをインポート
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Form;

class PostsController extends Controller
{
    //
    public function index(Request $request){
        $array = post::get(); //Postモデル（Postsテーブル）からレコード情報を取得して$arrayに格納している
        return view('posts.index',['array'=>$array]);
    }

    public function store(Request $request)
    {
        $userId = Auth::id(); // ログイン中のユーザーのIDを取得
        // バリデーションを追加
        $validated = $request->validate([
            'post' => 'required|min:1|max:150',
        ]);

        // 投稿を保存
        Post::create([
            'id'=> $Id,
            'user_id' => $userId,
            'post' => $validated['post'],
        ]);

        // リダイレクトやメッセージを表示
        return redirect()->back()->with('success', '投稿が登録されました！');

    }

        public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'post' => 'required|min:1|max:150',
        ]);
            // フォームから送信されたデータを取得
            $id = $request->input('id');
            $post_id = $request->input('post_id');

           // 投稿を取得し、ログインユーザーと一致しているか確認
            $post = Post::find($id);
            if ($post && $post->user_id === Auth::id()) {
                // 投稿内容を更新
                $post->post = $validated['post'];
                $post->save();
                // 更新後のページにリダイレクト
            return redirect('/top')->with('success', '投稿を更新しました！');
            } else {
            return redirect('/top')->withErrors('権限がありません。');
            }

            // 投稿内容を更新
            $post->post = $request->input('post');
            $post->save();
                }

        public function delete($id)
    {
            $post = Post::find($id);
        if ($post && $post->user_id === Auth::id()) {
            $post->delete();
        return redirect('/top')->with('success', '投稿を削除しました！');
    }
        // 権限がない場合や投稿が存在しない場合のエラーハンドリング
        return redirect('/top')->withErrors('権限がありません。');
    }

    public function search(Request $request)
    {
        // 1つ目の処理
            $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            $post = Post::where('title','like', '%'.$keyword.'%')->get();
        }else{
            $post = Post::all();
        }
        // 3つ目の処理
        return view('posts.index',['array'=>$array]);
    }

}
