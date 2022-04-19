@extends('layouts.base')

@section('title','みんなの投稿')

@section('content')

@if (session('poststatus'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('poststatus') }}
    </div>
@endif

<h2><strong>みんなの投稿</strong></h2>
@if (count($posts) > 0)
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @foreach ($posts as $post)
                <div class="box p-3 m-4">
                    <div class="box-head">
                        <img src="{{ asset('public'.$post->user->avatar )}}" class="d-block rounded-circle mb-3">
                        <strong>{{ $post->user->name }}</strong>
                        投稿日:{{ $post->created_at }}
                    </div>
                    <div class="mt-3">
                        <video controls loop autoplay muted width="500px" height="300px" src="{{ asset('storage/production ID_4957758.mp4') }}" type="video/mp4">
                    </div>
                    @if ($user_id == $post->user_id)
                    <div class="post_function">
                        <a href="{{ action('Admin\PostController@edit', $post->id) }}" class="m-3 btn btn-success"><i class="fa-solid fa-pen-to-square"></i>編集</a>
                        <form style="display: inline-block;" method="POST" action="{{ route('post_pages.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')"><i class="fa-solid fa-trash-can"></i>削除</button>
                        </form>
                    </div>
                    @endif
                    <div class="mt-3"><strong>GitHubのURL: </strong>{{ $post->git_url }}</div>
                    <div class="mt-3"><strong>サイトのURL: </strong>{{ $post->site_url }}</div>
                    <div class="mt-3"><strong>{{ $post->title }}</strong></div>
                    <div class="mt-3">{!!nl2br(e( $post->body ))!!}</div>
                </div>
                @endforeach
            </div>
            <div class="col"></div>
        </div>
    </div>
@endif
@endsection