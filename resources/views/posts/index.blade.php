<x-login-layout>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿フォーム</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    </header>
    <main>
        <form action="{{ route('follow-user') }}" method="POST">
            @csrf
            <input type="hidden" name="followed_id" value="{{ $user->id }}"> <!-- フォローされるユーザーのID -->
            <button type="submit" class="btn btn-primary">フォロー</button>
                <!-- アイコン画像のみのラベル -->
                <img src="images/icon1.png" style="width: 40px; height: 40px;">
                <textarea id="content" name="content" rows="5" placeholder="投稿内容を入力してください。" required></textarea>
            </div>
            <div class="submit">
                <button type="submit">
                    <img src="images/post.png" style="width: 40px; height: 40px;">
                </button>
            </div>
        </form>
        @if (Auth::user()->isFollowing($user->id)) <!-- ユーザーが既にフォローしているかチェック -->
        <form action="{{ route('unfollow-user') }}" method="POST">
           @csrf
           @method('DELETE')
           <input type="hidden" name="followed_id" value="{{ $user->id }}">
           <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="{{ route('follow-user') }}" method="POST">
           @csrf
           <input type="hidden" name="followed_id" value="{{ $user->id }}">
           <button type="submit" class="btn btn-primary">フォロー</button>
        </form>
        @endif
    </main>

    <footer>
    </footer>
    <script src="script.js"></script>
</body>
</html>

</x-login-layout>
