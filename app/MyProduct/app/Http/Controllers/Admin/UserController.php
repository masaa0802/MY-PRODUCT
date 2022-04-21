<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*メールアドレス編集*/

    //userデータの編集
    public function edit() {
        $user = Auth::user();
        return view('pages.myprofileedit', ['user' => $user ]);
    }
    //userデータの保存
    public function update(Request $request) {

        $user = Auth::user();
        $user_form = $request->all();

        $avatar = $request->file('avatar');
        if ($avatar != null) {
            $user_form['avatar'] = $this->saveProfileImage($avatar); // return file name
        }

        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('/mypage');
    }

    private function saveProfileImage($image) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });

        // // save
        $avatar = request()->file('avatar')->getClientOriginalName();
        request()->file('avatar')->storeAs('public/avater_img', $avatar);

        // return file name
        return $avatar;
    }

    // // 退会機能
    public function destroy()
    {
        $user = User::find();
        $user->delete();
        return redirect('/delete_complete');
    }

    public function delete_confirm()
    {
        return view('pages.delete_confirm');
    } 
}
