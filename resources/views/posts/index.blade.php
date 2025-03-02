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
        <form action="/submit-post" method="POST">
            @csrf
            <div>
                <!-- アイコン画像のみのラベル -->
                <img src="images/icon1.png" style="width: 40px; height: 40px;">
                <textarea id="content" name="content" rows="5" placeholder="投稿内容を入力してください。" required></textarea>
            </div>
            <div>
                <button type="submit">
                    <img src="images/post.png" style="width: 40px; height: 40px;">
                </button>
            </div>
        </form>
    </main>
    <footer>
    </footer>
    <script src="script.js"></script>
</body>
</html>


  <h2>機能を実装していきましょう。</h2>

</x-login-layout>
