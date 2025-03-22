<x-login-layout>

    <main>
    <div class="follow-icon-list">
        <p class="follow-title">フォローリスト</p>
        @foreach($users as $value)
        <div class="follow-icon-list">
            @if(Auth::user()->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <figure><a href="{{route('userProfile',['id' =>$user->id])}}">
            <img src="{{asset('images/icon1.png')}}" style="width: 40px; height: 40px;" ></a></figure>
            <!-- asset関数はアセットファイル（CSS、JavaScript、画像など）へのURLを生成するために使用 -->
            @else
            <figure><a href="{{route('userProfile',['id' =>$user->id])}}"><img src="{{asset('/storage/images/' . $value->icon_image)}}"style="width: 40px; height: 40px;"></a></figure>
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
        </div>
        @endforeach


        @foreach($posts as $value)
        <div class="content">
            <p>{{ $value->post }}</p>
            @if(Auth::user()->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <img src="{{asset('images/icon1.png')}}" style="width: 40px; height: 40px;" >
            @else
            <img src="{{asset('/storage/images/' . $value->icon_image)}}"style="width: 40px; height: 40px;">
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
            <p>{{ $value->created_at }}</p>
        </div>
        @endforeach

        </div>
    </main>

</x-login-layout>
