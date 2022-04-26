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
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post_pages.edit', compact('post'));
    }
    
    
    /**
     * 編集実行
     */
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->user_id = Auth::id();
        $file_name = $request->file('video')->getClientOriginalName();
        $post->video = $request->file('video')->storeAs('public/video',$file_name);
        $post->git_url = $request->input('git_url');
        $post->site_url = $request->input('site_url');
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        return redirect('/post_pages')->with('poststatus', '投稿を編集しました');
    }

    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/post_pages')->with('poststatus', '削除しました');
    }

}

