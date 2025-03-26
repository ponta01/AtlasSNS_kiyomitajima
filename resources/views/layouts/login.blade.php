<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <p class="authUser">{{Auth::User()->username}}さんの</p>
        <div class="followCount">
          <p>フォロー数</p>
          <p>{{Auth::User()->follows->count()}}名</p>
        </div>
        <a href="{{ asset('follows/followList') }}" class="btn btn-primary" style="width: 120px;">フォローリスト</a>
        <div class="followCount">
          <p>フォロワー数</p>
          <p>{{Auth::User()->followers->count()}}名</p>
        </div>
        <a href="{{ asset('follows/followerList') }}" class="btn btn-primary" style="width: 120px;">フォロワーリスト</a>
      </div>
      <a href="{{ asset('/search') }}"class="btn btn-primary" style="width: 150px;">ユーザー検索</a>
    </div>
  </div>
  <!-- <footer>
  </footer> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>

</body>

</html>
