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
                {{-- @php dd(asset('public/profiles'.$post->user->avater));
                @endphp --}}
                <div class="box p-3 m-4">
                    <div class="box-head">
                        <img src="{{ asset('public/profiles'.$post->user->avater) }}">
                        <strong>{{ $post->user->name }}</strong>
                        投稿日:{{ $post->created_at }}
                    </div>
                    <div class="mt-3">
                        <video controls loop autoplay muted width="500px" height="300px">
                            <source src="{{ asset('video/jnezh80RzKl2Hl74OesCC9u71WJP9VAyAtKv6eCQ.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="mt-3"><strong>GitHubのURL: </strong>{{ $post->git_url }}</div>
                    <div class="mt-3"><strong>サイトのURL: </strong>{{ $post->site_url }}</div>
                    <div class="mt-3"><strong>{{ $post->title }}</strong></div>
                    <div class="mt-3">{{ $post->body }}</div>
                </div>
                @endforeach
            </div>
            <div class="col"></div>
        </div>
    </div>
@endif
@endsection