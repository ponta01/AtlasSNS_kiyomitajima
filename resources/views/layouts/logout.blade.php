<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--IEブラウザ対策-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="ページの内容を表す文章" />
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/logout.css') }} ">
        <!--スマホ,タブレット対応-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--サイトのアイコン指定-->
        <link rel="icon" href="{{ url('images/icon5.png') }}" sizes="16x16" type="image/png" />
        <link rel="icon" href="{{ url('images/icon6.png') }}" sizes="32x32" type="image/png" />
        <link rel="icon" href="{{ url('images/icon7.png') }}" sizes="48x48" type="image/png" />
        <link rel="icon" href="{{ url('images/icon8.png') }}" sizes="62x62" type="image/png" />
        <!--iphoneのアプリアイコン指定-->
        <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    </head>
    <body>
        <header>
            <div class="titleTop">
            <img src="images/atlas.png" id="logo">
            <p class="social">Social Network Service</p></div>
        </header>
        <div id="container">
            {{ $slot }}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
