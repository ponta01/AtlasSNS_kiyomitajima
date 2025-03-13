<x-login-layout>

    <main>
        <a href="{{ asset('/followerList.blade') }}">フォロワーリスト</a>
        <form action="/submit-post" method="POST">
            @csrf
            <div>
                <label for="title">タイトル:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="post">内容:</label>
                <textarea id="post" name="post" rows="5" required></textarea>
            </div>
            <div>
                <button type="submit">投稿</button>
            </div>
        </form>
    </main>

</x-login-layout>
