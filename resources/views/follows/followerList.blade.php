<x-login-layout>
    <main>
        @foreach ($followingId as $value)
<tr>・
    ・
    <td></td>
    ↓下記に修正
    <td>{{ $value->followingId }}</td>
・
・
</tr>
@endforeach




        <a href="{{ asset('/followList.blade') }}">フォロワーリスト</a>
        <form action="{{ asset('/submit-post') }}" method="POST">
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
