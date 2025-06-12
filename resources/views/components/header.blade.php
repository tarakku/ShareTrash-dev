<header>
    <div class="Shere_Trash_icon">
        <img src="{{ asset('header_images/Shere_Trash_icon.png') }}" alt="Shere_Trash_icon">
        <h1>ShareTrash</h1>
    </div>      
    <nav>
        <ul>
            <li><a href="#">Form</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Members</a></li>

            <li class="login">
                <img class="login_icon" src="{{ asset('header_images/login_icon.png') }}" alt="login_icon">
                
                {{ Auth::user()?->nickname ?? 'ゲスト' }}
                
            </li>
        </ul>
    </nav>
</header>