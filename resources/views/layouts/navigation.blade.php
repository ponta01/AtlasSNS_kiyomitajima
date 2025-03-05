        <!-- <p>ナビゲーション(青い帯の中)</p> -->

        <div id="head">
            <h1><a href="{{ url('/top') }}">
        <img src="{{ asset('images/atlas.png') }}" alt="Logo">
                </a></h1>
            <div id="accordion">
                <!-- <div id=""> -->
                <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button">
                </button>
            </h2>
            <div id="menu1" class="accordion-collapse">
                <div class="accordion-body">
                    <p>さん</p>
                </div>
                <ul>
                    <li class="accordion-item"><a href="{{ url('top') }}">HOME</a></li>
                    <li class="accordion-item"><a href="{{ url('profile') }}">プロフィール編集</a></li>
                    <li class="accordion-item"><a href="{{ url('logout') }}">ログアウト</a></li>
                </ul>
            </div>
        </div>
