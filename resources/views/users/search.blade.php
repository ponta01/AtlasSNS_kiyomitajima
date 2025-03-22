<x-login-layout>
  <main>
        <div class="search">
            <form action="{{ route('users.search') }}" method="POST">
              @csrf
              <input type="text" name="username" class="form" placeholder="ユーザー名">
              <button type="submit" class="btn btn-success"><img src="images/search.png" style="width: 40px; height: 40px;"></button>
            </form>
        </div>

        @if(!empty($username))
        <p>検索ワード：{{$username}}</p>
        @endif

        @foreach($users as $value)
        @if($value->id !== Auth::user()->id)
        <div class="search">
            <p>{{ $value->username }}</p>
            <img src="{{ $value->icon_image }}" />
        </div>
        @endif
        @endforeach

        @foreach ($users as $user)
        <div>
        <p>{{ $user->name }}</p>

        @if (Auth::user()->isFollowing($user->id)) <!-- ログインユーザーがフォローしている状態であるなら($userに格納されているidを取得してね) -->
            <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">フォロー解除</button>
            </form>
        @else
            <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">フォローする</button>
            </form>
        @endif
        </div>
        @endforeach
  </main>


</x-login-layout>
