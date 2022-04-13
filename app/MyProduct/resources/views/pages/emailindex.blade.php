@extends('layouts.base')

@section('title','メールアドレス変更')

@section('content')
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-box">
                    <div class="login-header">
                        <p class="mb-0">メールアドレスの変更</p>
                    </div>
                    <div class="mt-3">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <p><strong>以下のメールアドレスに変更でよろしいですか？<br><?php $user = Auth::user(); ?>{{ $user->email }}</strong></p>

                        <a href="{{ action('Admin\UserController@edit') }}"><button class="user-btn">更新</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection