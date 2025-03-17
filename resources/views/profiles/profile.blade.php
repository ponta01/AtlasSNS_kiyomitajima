<x-login-layout>
    <div class= "profile content">
      <img src="images/icon1.png" style="width: 40px; height: 40px;">
      <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

          <label for="name">ユーザー名:</label>
          <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="admin" required>
          <br>

          <label for="password">メールアドレス:</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@atlas.com" required>
          <br>

          <label for="password">パスワード:</label>
          <input type="password" id="password" name="password" value="{{ old('password', $user->password) }}" required>
          <br>

          <label for="password">パスワード確認:</label>
          <input type="password" id="password" name="password" value="{{ old('password', $user->password) }}" required>
          <br>

          <label for="introduction">自己紹介:</label>
          <input type="introduction" id="introduction" name="introduction" value="{{ old('introduction', $user->introduction) }}" placeholder="Laravelの勉強をしています。" required>
          <br>

          <label for="profile_image">アイコン画像:</label>
          <input type="file" id="profile_image" name="profile_image">
          @if ($user->profile_image)
            <br>現在の画像: <img src="{{ asset('storage/' . $user->profile_image) }}" alt="アイコン画像" style="width: 100px; height: 100px;">
          @endif
          <br>

          <button type="submit" href= "/top">更新</button>
      </form>
    </div>


</x-login-layout>
