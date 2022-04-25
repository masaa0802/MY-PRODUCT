@extends('layouts.base')

@section('title','メールアドレス変更')

@section('content')
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mypageedit-box">
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
                            <div class="box-head d-flex flex-row bd-highlight">
                                <img src="{{ asset('storage/avater_img/'.$user->avatar) }}" class="m-3 d-block rounded-circle mb-3" style="width:50px; height:50px; position: relative; left: 40%;" id="img">
                            </div>
                            <input id="avatar" type="file" name="avatar" class="form-control mb-2" style="width: 60%; left: 20%; position: relative;" onchange="previewImage(this);">

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
                                <x-input id="name" class="block mt-1 mb-2 w-full form-control" type="text"  name="name" placeholder="新しい名前" value="{{ $user->name }}" style="width: 60%; left: 20%; position: relative;" required autofocus />
                            </div>
                            <div>
                                <x-label for="email" :value="__('メールアドレス')" />
                                <x-input id="email" class="block mt-1 mb-2 w-full form-control" type="email"  name="email" placeholder="新しいメールアドレス" style="width: 60%; left: 20%; position: relative;" value="{{ $user->email }}"  required autofocus />
                            </div>
                            <a class="btn btn-secondary mt-4 m-3" href="{{ route('mypage' ) }}">
                                戻る
                            </a>
                            <x-button class="ml-3 mt-4 m-3 btn btn-success btn-sm">
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