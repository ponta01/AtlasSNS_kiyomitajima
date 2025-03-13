<x-login-layout>
  <main>
    <form action="/search" method="post">
      @csrf
        <input type="text" name="keyword" class="form" placeholder="ユーザー名">
        <a href ="/search">
          <img src="images/search.png" style="width: 40px; height: 40px;">
        </a>
    </form>
  </main>


</x-login-layout>
