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
    public function edit($id) {
        $user = Auth::user()
        return view('pages.myprofileedit', ['user' => $user ]);
    }
    //userデータの保存
    public function update($id,Request $request) {

        $user_form = $request->all();
        $user = Auth::user();

        $avater = $request->file('avater');
        if ($avater != null) {
            $user_form['avater'] = $this->saveProfileImage($avater, $id); // return file name
        }

        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('/mypage');
    }

    public function profile() {
        $user = Auth::user();
        return view('myprofileedit', ['user' => $user]);
    }

    private function saveProfileImage($image,$id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }

    // // 退会機能
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();
        return redirect('/delete_complete');
    }

    public function delete_confirm()
    {
        return view('pages.delete_confirm');
    } 
}
