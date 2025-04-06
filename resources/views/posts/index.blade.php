<x-login-layout>

    <form action="{{ route('post.store') }}" method="POST" class="formTag">
        @csrf
        <div class="post">
            @if(Auth::User()->icon_image === 'icon1.png')
                <img src="{{asset('icon_images/icon1.png')}}" style="width: 40px; height: 40px;" >
            @else
                <img src="{{asset('storage/' . auth::User()->icon_image)}}" style="width: 40px; height: 40px;">
            @endif
                <textarea id="post_id" name="post" rows="5" placeholder="投稿内容を入力してください。" required></textarea>
                <input type= "image" src="images/post.png" id="post-button" style="width: 40px; height: 40px;">
        </div>
            <!-- @if(session('success'))
            <p>{{ session('success') }}</p>
            @endif -->
    </form>

    @foreach($array as $value)
        <!-- $arrayからuserテーブルを呼び出す、そこからusernameを呼び出す -->
        <div class="content">
            <p class="cont">{{ $value->user->username }}</p>
            <p class="cont">{{ $value->post }}</p>
            @if($value->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <img src="{{asset('icon_images/icon1.png')}}" id="pstIcon" style="width: 40px; height: 40px;" >
            @else
            <img src="{{ asset('storage/' . $value->user->icon_image) }}" id="pstIcon" style="width: 40px; height: 40px;">
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
            <p class="date">{{ $value->created_at }}</p>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            @if($value->user_id === Auth::id())
            <div class="button-wrapper"><a class="js-modal-open" href="" post="{{ $value->post }}" post_id="{{ $value->id }}"><img src="images/edit.png" style="width: 40px; height: 40px;"></a>

                <a href ="/post/{{$value->id}}/delete" id="trash"  onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                <img src="images/trash-h.png" onmouseover="this.src='images/trash.png'" onmouseout="this.src='images/trash-h.png'" style="width: 40px; height: 40px;">
                </a>
            </div>
            @endif
        </div>
    @endforeach

    @foreach($array as $value)
        <!-- モーダルの中身 -->
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form action="{{ route('post.update' , ['id' => $value->id])}}" method="POST">
                <!-- <input type="submit" value="更新"> -->
                {{ csrf_field() }}
                <textarea name="post" class="modal_update" rows="5" required>{{ $value->post }}</textarea>
                <input type="hidden" name="id" class="update_id" value="{{ $value->id }}">
                <input type= "image" class="editIcon" src="images/edit.png" style="width: 40px; height: 40px;">
                </form>
            </div>
        </div>
    @endforeach

</x-login-layout>
