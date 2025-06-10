<div class="main_nav">
    <nav>
    <ul>
        <li><a href="{{ route('category') }}">category</a></li>
        <li><a href="{{ route('allpost') }}">Allpost</a></li>
        <li><a href="#">Mypost</a></li>
    </ul>
    </nav>
    @guest
    <button><a href="{{ route('login', ['redirect_to' => url()->current()]) }}">Login/Register</a></button>
    @endguest
    @auth
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <button type="button">Log Out</button>
        </a>

        {{-- ログアウトフォーム (変更なし) --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            {{-- ここで現在のURLを hidden input に設定 --}}
            <input type="hidden" name="redirect_after_logout" value="{{ url()->current() }}">
        </form>
    @endauth
</div>

@auth
<button>create</button>
@endauth