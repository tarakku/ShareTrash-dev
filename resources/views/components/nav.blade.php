<header class="header">
    <nav class="main-nav">
        <a href="{{ route('category') }}" class="nav-link [active]">カテゴリー</a>
        <a href="{{ route('posts.allpost') }}" class="nav-link [active]">すべてのポスト</a>
        @auth
        <a href="{{ route('posts.my') }}" class="nav-link [active]">自分のポスト</a>
        @endauth
    </nav>
    <div class="header-right">
        <div class="search-bar">
            <input type="text" placeholder="Value">
            <button class="clear-search">×</button>
        </div>
        @guest
        <button class="sign-up-btn"><a href="{{ route('login', ['redirect_to' => url()->current()]) }}" class="btn-link">ログイン</a></button>
        @endguest
        @auth
            
            <button class="sign-out-btn"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-link">ログアウト</a></button>
            {{-- ログアウトフォーム (変更なし) --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                {{-- ここで現在のURLを hidden input に設定 --}}
                <input type="hidden" name="redirect_after_logout" value="{{ url()->current() }}">
            </form>
        @endauth
        </div>
</header>