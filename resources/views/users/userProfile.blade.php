<x-login-layout>

    <div class="userProfile">
        @foreach($users as $value)
        <img src="{{ asset('storage/' . $value->icon_image) }}" id="userProf" style="width: 40px; height: 40px;">
        <p class="userPro">{{ $value->username }}</p>
        <p class="userPro">{{ $value->bio }}</p>
        @endforeach

        @foreach ($users as $user)
        <div>

        @if (Auth::id() !== $user->id && Auth::user()->isFollowing($user->id)) <!-- ログインユーザーがフォローしている状態であるなら($userに格納されているidを取得してね) -->
        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                @csrf
            <span class="userFollow"><button type="submit" class="btn btn-danger">フォロー解除</button></span>
        </form>
        @else
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                @csrf
            <span class="userFollow"><button type="submit" class="btn btn-primary">フォローする</button></span>
        </form>
        @endif
    </div>
    @endforeach
    </div>


    @foreach($posts as $value)
        <div class="content">
            @if($value->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <a href="{{route('usersProfile',['id' =>$value->id])}}"></a>
            <img src="{{asset('images/icon1.png')}}" id="postIcon" style="width: 40px; height: 40px;" >
            @else
            <img src="{{asset('storage/' . $value->icon_image)}}"  id="postIcon" style="width: 40px; height: 40px;">
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
            <p class="postProf" >{{ $value->user->username }}</p>
            <p class="postProf" >{{ $value->post }}</p>
            <p class="date">{{ $value->created_at }}</p>
        </div>
        @endforeach


</x-login-layout>
