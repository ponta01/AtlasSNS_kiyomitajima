<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Postモデルをインポート
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Form;


class PostsController extends Controller
{
    //
    public function index(Request $request){
        $array = Post::with('user')->orderBy('created_at', 'desc')->get(); //Postモデル（Postsテーブル）からレコード情報を取得して$arrayに格納している
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
            $user_id = $request->input('user_id');

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
                }

        public function delete($id)
    {
            Post::where('id', $id)->delete();
            return redirect('/top')->with('success', '投稿を削除しました！');
    }

}
