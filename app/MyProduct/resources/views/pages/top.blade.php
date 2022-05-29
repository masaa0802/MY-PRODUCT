@extends('layouts.base')

@section('title','トップ画面')

@section('content')

<div class="top-content mt-2">
    <div class="container">
        <div class="row">
            <div class="col align-self-end">
                <img src="img/men.png" width="200" height="200">
            </div>
            <div class="col-7">
                <h1><strong>自分だけの『PRODUCT』を共有しよう</strong></h1>
                <h5>未経験エンジニア専用のポートフォリオ（アプリ）共有サイト</h5>
                <div class="login-box">
                    <div class="login-header">
                        <p class="mb-0">登録済みの方はこちらからログイン</p>
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}" class="mt-4">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('メールアドレス')" />

                            <x-input id="email" class="login_email mt-1 form-control" type="email" name="email" style="width: 60%; left: 20%; position: relative;" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('パスワード')" />

                            <x-input id="password" class="login_password mt-1 ml-3 form-control" type="password" name="password" style="width: 60%; left: 20%; position: relative;" required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('ログインのままにする') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れましたか?') }}<br>
                                </a>
                            @endif

                            <x-button class="ml-3 mt-3 btn btn-primary">
                                {{ __('ログイン') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <img src="img/women.png" width="200" height="200">
            </div>
        </div>
    </div>
</div>

@endsection