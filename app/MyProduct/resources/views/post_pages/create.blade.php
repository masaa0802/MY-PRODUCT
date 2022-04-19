@extends('layouts.base')

@section('title','新規投稿')

@section('content')
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            @if( Auth::check() )
                <form action="{{ route('post_pages.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <input type="file" id="video" name="video" class="form-control">
                    </div>
                    <div>
                        <label for="git_url" class="mt-3">GitHubのURL:</label>
                        <input name="git_url" class="form-control {{ $errors->has('git_url') ? 'is-invalid' : '' }}" placeholder="例)https://github.com/"/>
                    </div>
                    @if ($errors->has('git_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('git_url') }}
                        </div>
                    @endif

                    <div>
                        <label for="site_url" class="mt-3">サイトのURL:</label>
                        <input name="site_url" class="form-control {{ $errors->has('site_url') ? 'is-invalid' : '' }}" placeholder="例)https://www.google.com"/>
                    </div>
                    @if ($errors->has('site_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('site_url') }}
                        </div>
                    @endif
                    <div>
                        <label for="title" class="mt-3">タイトル:</label>
                        <input name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="タイトルの入力欄"/>
                    </div>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <div>
                        <textarea name="body" class="mt-3 form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="内容の入力" style="height:200px;"></textarea>
                    </div>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                    <button class="mt-3 btn btn-primary" type="submit">送信</button>
                </form>
            @endif
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection

