<x-logout-layout>

<div class="container">
  <div class="textCenter">
    <p class="added">{{ session('username') }}さん</p>
    <p class="added">ようこそ！AtlasSNSへ</p></div>
  <div class="margin">
    <p class="added">ユーザー登録が完了しました。</p>
    <p class="added">早速ログインをしてみましょう。</p></div>

    <p class="loginBtn"><a href="/login" class="btn btn-danger" style="width: 150%;">ログイン画面へ</a></p>
  </div>

</x-logout-layout>
