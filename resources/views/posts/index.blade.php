<x-login-layout>

    <main>
        <form action="{{ route('post.store') }}" method="POST">
        @csrf
            <div>
                <img src="images/icon1.png" style="width: 40px; height: 40px;">
                <textarea id="post_id" name="post" rows="5" placeholder="投稿内容を入力してください。" required></textarea>
                    <input type= "image" src="images/post.png" style="width: 40px; height: 40px;">
            </div>
            <!-- @if(session('success'))
            <p>{{ session('success') }}</p>
            @endif -->
        </form>

        @foreach($array as $value)
        <div class="content">
            <p>{{ $value->post }}</p>
            @if(Auth::user()->icon_image === 'icon1.png')
            <!-- ログインしているユーザーのイメージ画像がアイコン1だったらカラム名(icon_image) -->
            <img src="{{asset('images/icon1.png')}}" style="width: 40px; height: 40px;" >
            @else
            <img src="{{asset('/storage/images/' . $value->user->images)}}"style="width: 40px; height: 40px;">
            <!-- .は結合演算子。ストレージにある画像から実際にユーザーが登録した画像を表示させてね -->
            @endif
            <p>{{ $value->created_at }}</p>

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
                <a class="js-modal-open" href="" post="{{ $value->post }}" post_id="{{ $value->id }}"><img src="images/edit.png" style="width: 40px; height: 40px;"></a>

                <a href ="/post/{{$value->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                <img src="images/trash-h.png" style="width: 40px; height: 40px;">
                </a>
                @endif
            </div>

        @endforeach
        <!-- モーダルの中身 -->
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form action="{{ route('post.update' , ['id' => $value->id])}}" method="POST">
                <!-- <input type="submit" value="更新"> -->
                {{ csrf_field() }}
                <textarea name="post" class="modal_update" rows="5" required>{{ $value->post }}</textarea>
                <input type="hidden" name="id" class="update_id" value="{{ $value->id }}">
                <input type= "image" src="images/edit.png" style="width: 40px; height: 40px;">
                </form>
            </div>
        </div>

    </main>

</x-login-layout>
