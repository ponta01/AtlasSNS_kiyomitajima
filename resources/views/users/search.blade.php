<x-login-layout>

    <div class="search">
        <form action="{{ route('users.search') }}" method="POST">
            @csrf
            <input type="text" name="username" class="form" placeholder="ユーザー名">
            <button type="submit" class="btn-success"><img src="images/search.png" style="width: 40px; height: 40px;"></button>
        </form>

        @if(!empty($username))
        <p class="search-word">検索ワード：{{$username}}</p>
        @endif
    </div>

    <div class="search-wrapper">
        @foreach($users as $value)
        @if($value->id !== Auth::user()->id)
        <!-- 自分をはじく用のif文 -->
        <div class="search-flex">
            <div class="search-icon">
            <img src="{{ asset('storage/' . $value->icon_image) }}" style="width: 40px; height: 40px;">
            <p>{{ $value->username }}</p>
            </div>

            <div class="search-follow">
            @if (Auth::id() !== $value->id && Auth::user()->isFollowing($value->id)) <!-- ログインユーザーがフォローしている状態であるなら($userに格納されているidを取得してね) -->
            <form action="{{ route('unfollow', ['id' => $value->id]) }}" method="POST">
                @csrf
            <button type="submit" class="btn btn-danger">フォロー解除</button>
            </form>
            @else
            <form action="{{ route('follow', ['id' => $value->id]) }}" method="POST">
                @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
            </form>
            @endif
            </div>
        </div>
        @endif
        @endforeach
    </div>

</x-login-layout>
