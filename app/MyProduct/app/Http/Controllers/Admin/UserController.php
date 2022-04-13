<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //userデータの取得
    public function index() {
        return view('pages.emailindex', ['user' => Auth::user() ]);
    }
    //userデータの編集
    public function edit() {
        return view('pages.emailedit', ['user' => Auth::user() ]);
    }
    //userデータの保存
    public function update(Request $request) {

        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('/emailindex');
    }
    // // 退会機能
    public function withdrawal()
    {
       $user = Auth::user();
       $user->delete();
       Auth::logout();
       return redirect(route('login'));
    }
}
