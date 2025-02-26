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
        <a href="/followList.blade">フォロワーリスト</a>
        <form action="/submit-post" method="POST">
            @csrf
            <div>
                <label for="title">タイトル:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="content">内容:</label>
                <textarea id="content" name="content" rows="5" required></textarea>
            </div>
            <div>
                <button type="submit">投稿</button>
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
