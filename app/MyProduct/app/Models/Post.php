<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // usersテーブルとのリレーション（従テーブル側）
    public function user() { //1対多の「１」側なので単数系
        return $this->belongsTo('App\Models\User');
    }

    // 割り当て許可
    protected $fillable = [
        'video',
        'git_url',
        'site_url',
        'title', 
        'body',
        'user_id'
    ];
}
