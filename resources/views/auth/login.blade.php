<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/login']) !!}

  <p>AtlasSNSへようこそ</p>

  @if ($errors->any())
        <div class="error-messages">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

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

  <p><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}

</x-logout-layout>
