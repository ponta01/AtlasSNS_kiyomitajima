<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'icon_image',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function posts()
    {
        return $this->HasMany('App/Models/Post');
    }


    public function follows()
    {
        return $this->belongsToMany('App/Models/follow', 'follow','followed_id', 'following_id');
    }

    public function followers()
    {
        return $this->belongsToMany('App/Models/follow', 'follow', 'following_id', 'followed_id');
        // 引数の中身について①関係するモデルの場所、②中間テーブルの名前、③自分のidが入るカラム、④中間テーブルの相手モデルに関係しているカラム
    }

    public function isFollowing($user)
    // フォローしているかどうか確認するメソッド
    {
    return $this->following()->where('followed_id', $user->id)->exists();
    }

    }


//     データベースの準備 ユーザーデータベースにアイコン（画像）のファイルパスを保存するカラムを追加します。例えば、users テーブルに profile_image というカラムを持たせることができます。

// マイグレーション例:
//     Schema::table('users', function (Blueprint $table) {
//     $table->string('profile_image')->nullable(); // アイコン用の画像パス
// });
