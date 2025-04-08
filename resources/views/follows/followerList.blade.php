<x-login-layout>

    <div class="follow-icon-list">
        <p class="follow-title">フォロワーリスト</p>
        @foreach($users as $value)
        <div class="follow-icon">
            @if($value->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <a href="{{route('usersProfile',['id' =>$value->id])}}"><img src="{{asset('images/icon1.png')}}" id="follows-icon" style="width: 40px; height: 40px;" ></a>
        <!-- </a></figure> -->
            <!-- asset関数はアセットファイル（CSS、JavaScript、画像など）へのURLを生成するために使用 -->
            @else
            <a href="{{route('usersProfile',['id' =>$value->id])}}"><img src="{{ asset('storage/' . $value->icon_image) }} " id="follows-icon" style="width: 40px; height: 40px;"></a>
            <!-- </a></figure> -->
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
        </div>
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
            <p class="cont">{{ $value->user->username }}</p>
            <p class="cont">{!! nl2br(e($value->post)) !!}</p>
            <p class="date">{{ $value->created_at->format('Y-m-d H:i') }}</p>
        </div>
    @endforeach

</x-login-layout>
