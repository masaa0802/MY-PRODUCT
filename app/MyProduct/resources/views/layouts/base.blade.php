<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MY PRODUCT</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/bdca762954.js" crossorigin="anonymous"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            @include('includes.header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>