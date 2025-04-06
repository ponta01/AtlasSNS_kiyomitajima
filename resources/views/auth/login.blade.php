<x-logout-layout>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Centering Example</title>
    <style>
    </style>
</head>
<body>
    <div class="container">

  <x-slot:title>ログイン</x-slot:title>
  <p class="welcome-message">AtlasSNSへようこそ</p>
  @if ($errors->any())
        <div class="error-messages">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}
      <p class="label">{{ Form::label('メールアドレス') }}</p>
      {{ Form::text('email',null,['class' => 'input']) }}
    @if ($errors->has('email'))
        <p>{{ $errors->first('email') }}</p>
    @endif

      <p class="label">{{ Form::label('パスワード') }}</p>
      {{ Form::password('password',['class' => 'input']) }}
    @if ($errors->has('password'))
        <p>{{ $errors->first('password') }}</p>
    @endif

      <button type="submit" class="btn btn-danger" style="width: 40%;">ログイン</button>
    {!! Form::close() !!}

  <p class="register-link"><a href="register" >新規ユーザーの方はこちら</a></p>

</div>

</body>
</html>
</x-logout-layout>
