<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0",
            maximum-scale="1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index_style.css" />
    @vite(['resources/css/index.css','resources/css/footer.css', 'resources/js/index.js'])
</head>
<body>
    <div id= "fade-in-element" class="hidden">
        <!--ここからヘッダー-->
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
                        @guest
                        <a href="{{ route('login') }}">Login/Register</a>
                        @endguest
                        @auth
                        こんにちは、{{ Auth::user()->nickname }} さん！
                        @endauth
                    </li>
                </ul>
            </nav>
        </header>
        <!--ここまでヘッダー-->

        <div class="message">
            <h2>GreenCycle Comminity</h2>
            <h3>Connected Trash Can</h3>
        </div>

        <!--ここからメイン-->
        <main>
            <div class="main_nav">
                <nav>
                <ul>
                    <li><a href="#">category</a></li>
                    <li><a href="#">Allpost</a></li>
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

            @if ($posts->isEmpty())
                <p class="no-posts">まだ投稿がありません。</p>
            @else
                @foreach ($posts as $post)
                    <div class="post-container">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        @if ($post->category) {{-- カテゴリが存在するか確認（nullableの場合） --}}
                            <p class="post-category">カテゴリ: {{ $post->category->category_name }}</p>
                        @else
                            <p class="post-category">カテゴリ: なし</p>
                        @endif
                        <p class="post-content">{{ $post->views_count }}</p>
                        <p class="post-content">{{ $post->likes_count }}</p>
                        <p class="post-date">投稿日: {{ $post->posted_at->format('Y/m/d H:i') }}</p>
                        @if ($post->edited_at)
                            <p class="post-date">編集日: {{ $post->edited_at->format('Y/m/d H:i') }}</p>
                        @endif
                    </div>
                @endforeach
            @endif
            
        </main>
        
        
        <!--ここまでメイン-->

        <!--ここからフッター-->
        <footer>
        <div class="footer-container">
            <div class="footer-left">
                <img class="sharetrash-logo" src="{{ asset('footer_image/logo.png') }}">
            </div>
            <div class="footer-centor">
                <a href=" " class="contact-button">
                    <span>お問い合わせ<br>こちら</br></span>
                </a>
            </div>
            <div class="footer-right">
               
                <div class="community-info">
                    <p class="greencycle-text">GreenCycle</p>
                    <p class="community-text">Comminity</p>
                    <p class="connected-text">Connected Trash Can</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-links">
                <a href=" ">プライバシーポリシー</a>
                <a href=" ">利用規約</a>
            </div>
            <p>&copy; 2095 ShareTrash lnc. All rights No reservations</p>
        </div>
    </footer>
        <!--ここまでフッター-->
    </div>
</body>
</html>