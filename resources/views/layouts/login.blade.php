<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!--サイトのアイコン指定-->
  <link rel="icon" href="{{ url('images/icon1.png') }}" sizes="16x16" type="image/png" />
  <link rel="icon" href="{{ url('images/icon2.png') }}" sizes="32x32" type="image/png" />
  <link rel="icon" href="{{ url('images/icon3.png') }}" sizes="48x48" type="image/png" />
  <link rel="icon" href="{{ url('images/icon4.png') }}" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p> さんの</p>
        <div>
          <p>フォロー数</p>
          <p> 名</p>
        </div>
        <button type= button class=”btn btn-primary”><a href="{{ asset('follow/followList') }}">フォローリスト</a></button>
        <div>
          <p>フォロワー数</p>
          <p>名</p>
        </div>
        <button type= button class=”btn btn-primary”><a href="{{ asset('follower/followerList') }}">フォロワーリスト</a></button>
      </div>
      <button type= button class=”btn btn-primary”><a href="{{ asset('/search') }}">ユーザー検索</a></button>
    </div>
  </div>
  <!-- <footer>
  </footer> -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
