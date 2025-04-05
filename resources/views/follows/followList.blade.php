<x-login-layout>

    <div class="follow-icon-list">
        <p class="follow-title">フォローリスト</p>
        @foreach($users as $value)
        <div class="follow-icon">
            @if($value->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <a href="{{route('usersProfile',['id' =>$value->id])}}"><img src="{{asset('icon_images/icon1.png')}}" style="width: 40px; height: 40px;" ></a>
        <!-- </a></figure> -->
            <!-- asset関数はアセットファイル（CSS、JavaScript、画像など）へのURLを生成するために使用 -->
            @else
            <a href="{{route('usersProfile',['id' =>$value->id])}}"><img src="{{ asset('storage/' . $value->icon_image) }}" style="width: 40px; height: 40px;"></a>
            <!-- </a></figure> -->
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
        </div>
        @endforeach
    </div>


        @foreach($posts as $value)
        <div class="content">
            @if($value->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <a href="{{route('usersProfile',['id' =>$value->id])}}"><img src="{{asset('icon_images/icon1.png')}}" style="width: 40px; height: 40px;" ></a>
            @else
            <a href="{{route('usersProfile',['id' =>$value->id])}}">
            <img src="{{ asset('storage/' . $value->icon_image) }}" style="width: 40px; height: 40px;"></a>
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
            <p class="cont">{{ $value->user->username }}</p>
            <p class="cont">{{ $value->post }}</p>
            <p class="date">{{ $value->created_at }}</p>
        </div>
        @endforeach

</x-login-layout>
