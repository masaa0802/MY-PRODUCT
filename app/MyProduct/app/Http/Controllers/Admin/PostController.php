<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;
use Validator;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('post_pages.index', ['posts' => $posts, 'user_id' => $user_id, 'user' => $user]);
    }
    /**
     * 投稿フォーム
     */
    public function create()
    {
        return view('post_pages.create');
    }


    /**
    * バリデーション、登録データの整形など
    */
   public function store(PostRequest $request)
   {
        $savedata = [
            $file_name = $request->file('video')->getClientOriginalName(),
            'video' => $request->file('video')->storeAs('public/video',$file_name),
            'git_url' => $request->git_url,
            'site_url' => $request->site_url,
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ];
    
       $post = new Post;
       $post->fill($savedata)->save();
    
       return redirect('/post_pages')->with('poststatus', '新規投稿しました');
   }

   /**
     * 編集画面
     */
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('post_pages.edit', ['post' => $post]);
    }
    
    
    /**
     * 編集実行
     */
    public function update(PostRequest $request)
    {
        $savedata = [
            $file_name = $request->file('video')->getClientOriginalName(),
            'video' => $request->file('video')->storeAs('public/video',$file_name),
            'git_url' => $request->git_url,
            'site_url' => $request->site_url,
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user()->id
       ];
        
        $post = new Post;
        $post->fill($savedata)->save();
    
        return redirect('/post_pages')->with('poststatus', '投稿を編集しました');
    }

    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/post_pages')->with('poststatus', '削除しました');
    }

}

