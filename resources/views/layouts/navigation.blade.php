        <!-- <p>ナビゲーション(青い帯の中)</p> -->

        <div id="head">
            <h1><a href="{{ url('/top') }}">
        <img src="{{ asset('images/atlas.png') }}" alt="Logo">
                </a></h1>
            <div id="accordion">
                <!-- <div id=""> -->
                <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#menu1" aria-expanded="true">
                </button>
            </h2>
            <div id="menu1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <p>さん</p>
                </div>
                <ul>
                    <li class="accordion-item"><a href="{{ url('posts/index') }}">HOME</a></li>
                    <li class="accordion-item"><a href="{{ url('profiles/profile') }}">プロフィール編集</a></li>
                    <li class="accordion-item"><a href="{{ url('profile/logout') }}">ログアウト</a></li>
                </ul>
            </div>
        </div>
