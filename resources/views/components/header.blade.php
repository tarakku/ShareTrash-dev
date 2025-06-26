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
            <li><button id="toggleButton" class="style-none">お問い合わせ</button></li>
            <li class="login">
                <a href="{{ route('profile') }}">
                <img class="login_icon" src="{{ asset('header_images/login_icon.png') }}" alt="login_icon">
                </a>
                <a href="{{ route('profile') }}">
                {{ Auth::user()?->nickname ?? 'ゲスト' }}
                </a>
            </li>
        </ul>
    </nav>
</header>