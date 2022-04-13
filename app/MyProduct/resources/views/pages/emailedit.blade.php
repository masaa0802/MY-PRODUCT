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

                        <p><strong><?php $user = Auth::user(); ?>{{ $user->email }}</strong></p>
                        
                        <form method="POST" action="{{ action('Admin\UserController@update') }}" class="mt-4">
                            @csrf
                            <div>
                                <x-input id="email" class="block mt-1 mb-2 w-full" type="email"  name="email" placeholder="新しいメールアドレス" value="{{ $user->email }}"  required autofocus />
                            </div>
                            <x-button class="ml-3 mt-4 btn btn-success">
                                {{ __('ユーザー登録内容の編集') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection