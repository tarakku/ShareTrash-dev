<header>
    <div class="Shere_Trash_icon">
        <a href="{{route('category')}}">
            <img src="{{ asset('header_images/Shere_Trash_icon.png') }}" alt="Shere_Trash_icon">
        </a>
        <a href="{{route('category')}}" class="title">
            <h1>ShareTrash</h1>
        </a>
    </div>      
    <nav>
        <ul>
            <li><button class="style-none toggle-button">お問い合わせ</button></li>
            <li class="login">
                @auth
                    <a href="{{ route('mypage_or_login') }}">
                        <img class="login_icon" src="{{ asset('header_images/login_icon.png') }}" alt="login_icon">
                    </a>
                    <a href="{{ route('mypage_or_login') }}">
                        {{ Auth::user()->nickname }}
                    </a>
                @else
                    <a href="{{ route('mypage_or_login') }}">
                        <img class="login_icon" src="{{ asset('header_images/login_icon.png') }}" alt="login_icon">
                    </a>
                    <a href="{{ route('mypage_or_login') }}">
                        ゲスト（ログイン）
                    </a>
                @endauth
            </li>
        </ul>
    </nav>
</header>