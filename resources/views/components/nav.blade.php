<div class="main_nav">
    <nav>
    <ul>
        <li><a href="{{ route('category') }}">category</a></li>
        <li><a href="{{ route('allpost') }}">Allpost</a></li>
        <li><a href="#">Mypost</a></li>
    </ul>
    </nav>
    @guest
    <button><a href="{{ route('login') }}">Login/Register</a></button>
    @endguest
    @auth
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button type="button">Log Out</button>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf </form>
    @endauth
</div>

@auth
<button>create</button>
@endauth