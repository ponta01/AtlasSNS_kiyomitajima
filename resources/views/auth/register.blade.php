<x-logout-layout>
<!DOCTYPE html>
<html lang="ja"
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Centering Example</title>
    <style>
        /* 親要素にフレックスボックスを設定 */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* margin: 0; */
        }

    </style>
</head>
<body>
    <div class="container">
</body>
</html>

<x-slot:title>新規登録</x-slot:title>
<p class="welcome-message">新規ユーザー登録</p>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::email('email',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('新規登録') }}
{!! Form::close() !!}

<p class="register-link"><a href="login">ログイン画面へ戻る</a></p>
</x-logout-layout>
