@extends('layouts.base')

@section('title','マイページ')

@section('content')
<div class="m-3 box-head d-flex flex-row bd-highlight">
    <img <?php $user = Auth::user(); ?> src="{{ asset('storage/avater_img/'.$user->avatar) }}" class="m-3 d-block rounded-circle mb-3" style="width:50px; height:50px;">
    <h2 class="m-4"><strong><?php $user = Auth::user(); ?>{{ $user->name }}さんのマイページ</strong></h2>
    <p class="mt-4">ユーザー登録日時：{{ $user->created_at }}</p>
</div>
<!-- Authentication -->
<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="menu col">
            <a href="{{ action('Admin\UserController@edit') }}">
                <div class="text-center fontawesome mt-3">
                    <i class="fa-regular fa-address-card fa-3x"></i><br>
                    <p><strong>プロフィールの変更</strong></p>
                </div>
            </a>
        </div>
        <div class="menu col">
            <a href="{{ route('password.form') }}">
                <div class="text-center fontawesome mt-3">
                    <i class="fa-solid fa-key fa-3x"></i></i><br>
                    <p><strong>パスワードの変更</strong></p>
                </div>
            </a>
        </div>
        {{-- <div class="menu col">
            <a href="">
                <div class="fontawesome mt-3">
                    <i class="fa-solid fa-clock-rotate-left fa-3x"></i><br>
                    <p><strong>投稿履歴</strong></p>
                </div>
            </a>
        </div> --}}
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="text-center Withdrawal col-3" style="height:70px;">
            <a href="{{ route('pages.delete_confirm') }}">
                    <p><i class="fa-solid fa-circle-chevron-right"></i><strong>会員退会手続きへ</strong></p>
            </a>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection