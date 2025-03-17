<x-login-layout>
  <main>
        <div class="search">
            <form action="{{ route('users.search') }}" method="POST">
              @csrf
              <input type="text" name="username" class="form" placeholder="ユーザー名">
              <button type="submit" class="btn btn-success"><img src="images/search.png" style="width: 40px; height: 40px;"></button>
            </form>
        </div>

        @if(!empty($username))
        <p>検索ワード：{{$username}}</p>
        @endif

        @foreach($users as $value)
        @if($value->id !== Auth::user()->id)
        <div class="search">
            <p>{{ $value->username }}</p>
            <img src="{{ $value->icon_image }}" />
        </div>
        @endif
        @endforeach
  </main>


</x-login-layout>
