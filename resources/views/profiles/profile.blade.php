<x-login-layout>
    <div class="table-center">
      <table class= "profileContent">
      <img src="{{ asset('storage/' . $user->icon_image) }}" style="width: 40px; height: 40px;">
      <form action="{{ route('profileUpdate', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

          <tr>
            <td><label for="username" class="profile-label">ユーザー名:</label></td>
            <td><input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" placeholder="admin" required>
            <br></td>
          </tr>

          <tr>
            <td><label for="email" class="profile-label">メールアドレス:</label></td>
            <td><input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="admin@atlas.com" required>
          <br></td>
        </tr>

          <tr>
            <td><label for="password" class="profile-label">パスワード:</label></td>
            <td><input type="password" class="form-control" id="password" name="password" value="{{ old('password', $user->password) }}" required>
          <br></td>
        </tr>

          <tr>
            <td><label for="password_confirmation" class="profile-label">パスワード確認:</label></td>
            <td><input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation', $user->password_confirmation) }}" required>
          <br></td>
        </tr>

          <tr>
            <td><label for="bio" class="profile-label">自己紹介:</label></td>
            <td><input type="bio" class="form-control" id="bio" name="bio" value="{{ old('bio', $user->bio) }}" placeholder="Laravelの勉強をしています。" required>
          <br></td>
        </tr>

          <tr>
            <td><label for="icon_image" class="profile-label">アイコン画像:</label></td>
            <td><input type="file" class="form-control" id="icon_image" name="icon_image">
          @if ($user->icon_image)
            <br>現在の画像: <img src="{{ asset('storage/' . $user->icon_image) }}" alt="アイコン画像" style="width: 100px; height: 100px;">
          @endif
          <br></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-danger" style="width: 150px;">更新</button></form>
  </div>
</x-login-layout>
