<x-login-layout>
    <main>

    <!-- 下記2行はフォロー、フォロワーをブラウザに表示するときに必要になりそう。だけど、()の中は変数で呼び出さないといけないから、後で考える。php artisan migrate -->
    $following = User::find(1)->follows;// ユーザーID 1 のフォロー中のユーザー
    $followers = User::find(1)->followers; // ユーザーID 1 のフォロワー@foreach

        @foreach ($following_id as $value)
        <p>{{ $value->following_id }}</p>
        @endforeach

    </main>
</x-login-layout>
