@extends('layouts.base')

@section('title','About画面')

@section('content')
<h2 class="m-4"><strong>MY PRODUCTについて</strong></h2>
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="img/question.png" width="160" height="200">
                <div class="mt-3 align-self-end">
                    <img src="img/understand.png" width="160" height="200">
                </div>
            </div>
            <div class="col">
                <div class="balloon2-left">
                    <p><strong>MY PRODUCT</strong>って何ができるの？</p>
                </div>
                <div class="balloon2-right">
                    <p>　<strong>MY PRODUCTは未経験エンジニア専<br>
                        用のポートフォリオ共有サイト</strong>ですよ。<br>
                        他の人のポートフォリオを見て、自分の<br>
                        ポートフォリオを作成する参考にしたり、<br>
                        投稿してアピールする場にするも良し！
                    </p>
                </div>
                <div class="balloon2-left">
                    <p>なるほど！<br>
                        閲覧するユーザも投稿するユーザもメリットがあるね！</p>
                </div>
            </div>
            <div class="col align-self-center">
                <img src="img/answer.png" width="160" height="200">
            </div>
            
        </div>
    </div>
</div>

@endsection