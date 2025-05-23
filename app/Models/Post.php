<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id','post','user_id','icon_image','created_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // リレーションすることによって、投稿したユーザー情報(今回は投稿した時間)を取得できる
}
