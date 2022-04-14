@extends('layouts.base')

@section('title','退会')

@section('content')

<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">
          <h2><i class="fa-solid fa-triangle-exclamation"></i>退会手続きの前にご確認ください</h2>
        </div>
      <div class="card-body">
        <p>会員を退会された場合には、現在保存されている情報は<br>
            すべて削除されます。<br>
            本当に退会してよろしいですか？</p>
      </div>
    </div>

    <div class="btn-group">
        <div class="m-2">
            <a href="/mypage" class="btn btn-primary">キャンセルする</a>
        </div>

        {!! Form::open(['route'=>['users.destroy',Auth::user()->id],'method'=>'delete']) !!}
            {!!Form::submit('退会する',['class'=>'m-2 btn btn-danger'])!!}
        {!!Form::close()!!}

    </div>
</div>
@endsection