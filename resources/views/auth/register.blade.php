<x-logout-layout>
<!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Centering Example</title>
    </head>
    <body>
        <div class="container">

    <x-slot:title>新規登録</x-slot:title>
        <p class="welcome-message">新規ユーザー登録</p>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        @endif

        <!-- 適切なURLを入力してください -->
        {!! Form::open(['url' => '/register']) !!}
        <p class="label">{{ Form::label('ユーザー名') }}</p>
        {{ Form::text('username',null,['class' => 'input']) }}

        <p class="label">{{ Form::label('メールアドレス') }}</p>
        {{ Form::email('email',null,['class' => 'input']) }}

        <p class="label">{{ Form::label('パスワード') }}</p>
        {{ Form::password('password',null,['class' => 'input']) }}

        <p class="label">{{ Form::label('パスワード確認') }}</p>
        {{ Form::password('password_confirmation',null,['class' => 'input']) }}

        <button type="submit" class="btn btn-danger" style="width: 40%;">新規登録</button>
        {!! Form::close() !!}

        <p class="register-link"><a href="/login">ログイン画面に戻る</a></p>

        </div>
    </body>
    </html>
</x-logout-layout>
