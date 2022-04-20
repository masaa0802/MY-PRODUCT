<div class="header">
    <a class="logo" href="/">
        <img src="img/MY PRODUCT-logo.png" width="450" height="100">
    </a>
    @if(Auth::check())
    <div class="buttons ">
        <div class="button">
            <i class="fa-solid fa-user"></i>
            <a class="header-menu" href="/mypage">マイページ</a>
        </div>
        <div class="button">
            <i class="fa-solid fa-paper-plane"></i>
            <a class="header-menu" href="/post_pages/create">新規投稿</a>
        </div>
        <div class="button">
            <i class="fa-solid fa-rectangle-list"></i>
            <a class="header-menu" href="/post_pages">みんなの投稿</a>
        </div>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="button">
                <i class="fa-solid fa-right-from-bracket">
                    <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('ログアウト') }}
                    </x-dropdown-link>
                </i>
            </div>
        </form>
    </div>
    @else
    <div class="buttons">
        <div class="button">
            <i class="fa-solid fa-house"></i>
            <a class="header-menu" href="/">ホーム</a>
        </div>
        <div class="button">
            <i class="fa-solid fa-circle-question"></i>
            <a class="header-menu" href="/about">MY PRODUCTについて</a>
        </div>
        <div class="button">
            <i class="fa-solid fa-user-plus"></i>
            <a class="header-menu" href="/register">ユーザ登録</a>
        </div>
    </div>
        
    @endif

</div>
