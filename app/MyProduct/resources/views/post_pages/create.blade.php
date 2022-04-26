@extends('layouts.base')

@section('title','新規投稿')

@section('content')

<h2 class="m-4 mb-0"><strong>新規投稿</strong></h2>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            @if( Auth::check() )
                <form action="{{ route('post_pages.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <label for="video" class="mt-3">*ポートフォリオ動画</label>
                        <input type="file" id="video" name="video" value="{{ old('video') }}" class="form-control {{ $errors->has('video') ? 'is-invalid' : '' }}">
                        @if ($errors->has('video'))
                            <div class="invalid-feedback">
                                {{ $errors->first('video') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <label for="git_url" class="mt-3">*GitHubのURL</label>
                        <input name="git_url" value="{{ old('git_url') }}" class="form-control {{ $errors->has('git_url') ? 'is-invalid' : '' }}" placeholder="例)https://github.com/"/>
                        @if ($errors->has('git_url'))
                            <div class="invalid-feedback">
                                {{ $errors->first('git_url') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <label for="site_url" class="mt-3">サイトのURL(任意)</label>
                        <input name="site_url" value="{{ old('site_url') }}" class="form-control {{ $errors->has('site_url') ? 'is-invalid' : '' }}" placeholder="例)https://www.google.com"/>
                        @if ($errors->has('site_url'))
                            <div class="invalid-feedback">
                                {{ $errors->first('site_url') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <label for="title" class="mt-3">*タイトル</label>
                        <input name="title" value="{{ old('title') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="タイトルの入力欄"/>
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <textarea name="body" class="mt-3 form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="内容の入力" style="height:200px;">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>
                    <a class="btn btn-secondary mt-3 m-2" href="{{ route('post_pages.index' ) }}">戻る</a>
                    <button class="mt-3 m-2 btn btn-primary" type="submit">送信</button>
                </form>
            @endif
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection

