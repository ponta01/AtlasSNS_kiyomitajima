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

  <x-slot:title>ログイン</x-slot:title>
  <p class="welcome-message">AtlasSNSへようこそ</p>
  @if ($errors->any())
        <div class="error-messages">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    {!! Form::open(['url' => '/login']) !!}
      {{ Form::label('email') }}
      {{ Form::text('email',null,['class' => 'input']) }}
    @if ($errors->has('email'))
        <p>{{ $errors->first('email') }}</p>
    @endif

      {{ Form::label('password') }}
      {{ Form::password('password',['class' => 'input']) }}
    @if ($errors->has('password'))
        <p>{{ $errors->first('password') }}</p>
    @endif

      {{ Form::submit('login') }}
    {!! Form::close() !!}

  <p class="register-link"><a href="register">新規ユーザーの方はこちら</a></p>
</x-logout-layout>
