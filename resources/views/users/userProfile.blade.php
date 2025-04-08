<x-login-layout>

    <div class="userProfile">
    @foreach($users as $value)
        @if($value->icon_image === 'icon1.png')
            <!-- ユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <a href="{{route('usersProfile',['id' =>$value->id])}}"><img src="{{asset('images/icon1.png')}}" id="follows-icon" style="width: 40px; height: 40px;" ></a>
        @else
        <img src="{{ asset('storage/' . $value->icon_image) }}" id="userProf" style="width: 40px; height: 40px;">
        <div class="userPro-wrapper">
            <p class="userPro">{{ $value->username }}</p>
            <p class="userPro">{{ $value->bio }}</p>
        </div>
        @endif
    @endforeach

    @foreach ($users as $user)
        @if (Auth::id() !== $user->id && Auth::user()->isFollowing($user->id)) <!-- ログインユーザーがフォローしている状態であるなら($userに格納されているidを取得してね) -->
        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                @csrf
            <div class="userFollow"><button type="submit" class="btn btn-danger">フォロー解除</button></div>
        </form>
        @else
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                @csrf
            <div class="userFollow"><button type="submit" class="btn btn-primary">フォローする</button></div>
        </form>
        @endif
    @endforeach
    </div>

    @foreach($posts as $value)
        <div class="content">
        @if($value->user->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <a href="{{route('usersProfile',['id' =>$value->id])}}"><img src="{{asset('images/icon1.png')}}" id="pstIcon" style="width: 40px; height: 40px;" ></a>
        @else
            <a href="{{route('usersProfile',['id' =>$value->id])}}">
            <img src="{{ asset('storage/' . $value->user->icon_image) }}" id="pstIcon" style="width: 40px; height: 40px;"></a>
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
        @endif
            <p class="cont" >{{ $value->user->username }}</p>
            <p class="cont" >{!! nl2br(e($value->post)) !!}</p>
            <p class="date">{{ $value->created_at->format('Y-m-d H:i') }}</p>
        </div>
    @endforeach


</x-login-layout>
