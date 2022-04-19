@extends('layouts.base')

@section('title','メールアドレス変更')

@section('content')
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-box">
                    <div class="login-header">
                        <p class="mb-0">プロフィールの変更</p>
                    </div>
                    <div class="mt-3">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        
                        <form method="POST" action="{{ action('Admin\UserController@update')}}" class="mt-4" enctype="multipart/form-data">
                            @csrf

                            <label for="avater">プロフィール画像</label>

                            <label for="avater" class="btn">
                            <img src="{{ asset('storage/img/'.$user->avater) }}" id="img">
                            <input id="avater" type="file" name="avater" onchange="previewImage(this);">
                            </label>

                            <script>
                                function previewImage(obj)
                                {
                                  var fileReader = new FileReader();
                                  fileReader.onload = (function() {
                                    document.getElementById('img').src = fileReader.result;
                                  });
                                  fileReader.readAsDataURL(obj.files[0]);
                                }
                            </script>

                            <div>
                                <x-label for="name" :value="__('名前')" />
                                <x-input id="name" class="block mt-1 mb-2 w-full" type="text"  name="name" placeholder="新しい名前" value="{{ $user->name }}"  required autofocus />
                            </div>
                            <div>
                                <x-label for="email" :value="__('メールアドレス')" />
                                <x-input id="email" class="block mt-1 mb-2 w-full" type="email"  name="email" placeholder="新しいメールアドレス" value="{{ $user->email }}"  required autofocus />
                            </div>
                            <a class="btn btn-secondary mt-4" href="{{ route('mypage' ) }}">
                                戻る
                            </a>
                            <x-button class="ml-3 mt-4 btn btn-success">
                                {{ __('更新') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection