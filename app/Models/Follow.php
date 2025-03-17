<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    use HasFactory;

    // protected $table = 'follows';

    // protected $fillable = [
    //     'following_id',
    //     'followed_id',
    // ];
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id');
    }

    public function followed()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id');
    }

    // 自分のユーザーと紐ついているレコードが存在するかチェックするメソッド
    public static function checkIfUserHasFollowRecords()
    {
        $userId = Auth::id(); // 現在ログインしているユーザーのIDを取得

        // followsテーブルで自分のIDに関連付けられたレコードが存在するか確認
        return self::where('following_id', $userId)->exists();
    }
}
