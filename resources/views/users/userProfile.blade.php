<x-login-layout>

    <div class="userProfile">
        @foreach($users as $value)
        <p>{{ $value->username }}</p>
        <p>{{ $value->bio }}</p>
        <img src="{{ asset('storage/' . $user->icon_image) }}" style="width: 40px; height: 40px;">
        @endforeach

    </div>

    @foreach ($users as $user)
    <div>
        <p>{{ $user->name }}</p>

        @if (Auth::id() !== $user->id && Auth::user()->isFollowing($user->id)) <!-- ログインユーザーがフォローしている状態であるなら($userに格納されているidを取得してね) -->
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


    @foreach($posts as $value)
        <div class="content">
            <p>{{ $value->post }}</p>
            @if($value->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <a href="{{route('usersProfile',['id' =>$value->id])}}"></a>
            <img src="{{asset('images/icon1.png')}}" style="width: 40px; height: 40px;" >
            @else
            <img src="{{asset('storage/' . $value->icon_image)}}"style="width: 40px; height: 40px;">
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
            <p class="date">{{ $value->created_at }}</p>
        </div>
        @endforeach


</x-login-layout>
