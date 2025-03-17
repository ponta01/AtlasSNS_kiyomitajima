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

    public function follows()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'followed_id');
    }

    public function isFollowing($userId)
    {
    return Follow::where('following_id', $this->id)
                ->where('followed_id', $userId)
                ->exists();
    }

//     データベースの準備 ユーザーデータベースにアイコン（画像）のファイルパスを保存するカラムを追加します。例えば、users テーブルに profile_image というカラムを持たせることができます。

// マイグレーション例:
//     Schema::table('users', function (Blueprint $table) {
//     $table->string('profile_image')->nullable(); // アイコン用の画像パス
// });

}
