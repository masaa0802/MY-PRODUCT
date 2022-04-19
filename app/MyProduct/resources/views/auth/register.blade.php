@extends('layouts.base')

@section('title','新規登録')

@section('content')

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col register-box ">
            <div class="register-header text-center">
                <p>新規ユーザ登録</p>
            </div>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form class="m-4" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                {{-- Avater --}}
                <div class="mt-4">
                    <label for="avatar" class="block mt-1 w-full">{{ __('プロフィール画像 (サイズは1024Kbyteまで）') }}</label>
    
                    <div class="col-md-6">
                        <input id="avatar" type="file" name="avatar" class="@error('avatar') is-invalid @enderror">
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
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('メールアドレス')" />
    
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('パスワード')" />
    
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('確認パスワード')" />
    
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
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