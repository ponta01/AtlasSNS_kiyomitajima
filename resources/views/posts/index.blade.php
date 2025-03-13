<x-login-layout>

    <main>
        <form action="{{ route('post.store') }}" method="POST">
        @csrf
            <div>
                <img src="images/icon1.png" style="width: 40px; height: 40px;">
                <textarea id="post_id" name="post" rows="5" placeholder="投稿内容を入力してください。" required></textarea>
                <a href ="/top">
                    <img src="images/post.png" style="width: 40px; height: 40px;">
                </a>
            </div>
            <!-- @if(session('success'))
            <p>{{ session('success') }}</p>
            @endif -->
        </form>

        @foreach($array as $value)
            <div class="content">
            <!-- 投稿の編集ボタン（自分の投稿のみ表示） -->
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->post }}</td>
                <td>{{ $value->user_id }}</td>
                <!-- ↓ここを追加してください -->
                <td><a class="js-modal-open" href="/top" post="{{ $value->post }}" post_id="{{ $value->id }}"><img src="images/edit.png" style="width: 40px; height: 40px;"></a>
            </tr>
            <!-- 住所を書いただけではがきには何も書いていない状態 -->
        <form action="{{ route('post.update', ['id' => $value->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $value->id }}">
            <textarea name="post" rows="5" required>{{ $value->post }}</textarea>

        </form>
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
                <a href ="/top" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                <img src="images/trash-h.png" style="width: 40px; height: 40px;">
                </a>
                @endif
            </div>

        @endforeach
        <!-- モーダルの中身 -->
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form action="{{ route('post.update') }}" method="POST">
                <input type="hidden" name="post_id" value="{{ $value->id }}">
                <!-- <input type="submit" value="更新"> -->
                {{ csrf_field() }}
                <textarea name="post" rows="5" required>{{ $value->post }}></textarea>
                </form>
                <a class="js-modal-close" href="/top"><img src="images/edit.png" style="width: 40px; height: 40px;"></a>
            </div>
        </div>
    </main>

</x-login-layout>
