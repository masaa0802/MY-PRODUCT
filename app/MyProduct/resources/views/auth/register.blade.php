@extends('layouts.base')

@section('title','新規登録')

@section('content')
<h2 class="m-4 mb-0"><strong>新規ユーザ登録</strong></h2>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="text-center">
            </div>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form class="m-4" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                {{-- Avater --}}
                <div class="mt-4 mt-0">
                    <label for="avatar">{{ __('プロフィール画像 (サイズは1024Kbyteまで）') }}</label>
                    <div class="col">
                        <input id="avatar" type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <!-- Name -->
                <div class="mt-4">
                    <x-label for="name" :value="__('名前')" />
                    <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('メールアドレス')" />
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('パスワード')" />
                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('確認パスワード')" />
                    <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/">
                        {{ __('すでに登録されていますか?') }}<br>
                    </a>
    
                    <x-button class="mt-4 btn btn-primary">
                        {{ __('登録') }}
                    </x-button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
    
@endsection