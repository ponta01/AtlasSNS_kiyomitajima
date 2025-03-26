        <!-- <p>ナビゲーション(青い帯の中)</p> -->

<div id="head">
    <a href="{{ url('/top') }}">
        <img src="{{ asset('images/atlas.png') }}" id="atlas">
    </a>
    <div class="flex">
        <p class="loginUsername">{{Auth::User()->username}} さん</p>
    </div>
    <div id="accordion">
            <!-- <div id=""> -->
        <div class="accordion-item">
            <p class="accordion-button"></p>
                <ul class="accordion-content">
                    <li><a href="{{ url('top') }}">HOME</a></li>
                    <li><a href="{{ url('profile') }}">プロフィール編集</a></li>
                    <li><a href="{{ url('logout') }}">ログアウト</a></li>
                </ul>
        </div>
    </div>
    <img src="{{asset('storage/' . auth::User()->icon_image)}}" id="icon">
</div>
