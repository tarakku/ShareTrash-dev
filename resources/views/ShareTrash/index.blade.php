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
                <img src="./header_images/Shere_Trash_icon.png" alt="Shere_Trash_icon">
                <h1>ShareTrash</h1>
            </div>    
            <nav>
                <ul>
                    <li><a href="#">Form</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Members</a></li>

                    <li class="login">
                        <img class="login_icon" src="./header_images/login_icon.png" alt="login_icon">
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

            <div class="main_category">
                <img src="{{ asset('category_icon/燃えるごみ.png') }}" alt="燃えるごみ">
                <img src="{{ asset('category_icon/不燃ごみ.png') }}" alt="不燃ごみ">
                <img src="{{ asset('category_icon/インクカートリッジ.png') }}" alt="インクカートリッジ">
                <img src="{{ asset('category_icon/カン.png') }}" alt="カン">
                <img src="{{ asset('category_icon/カン2.png') }}" alt="カン2">
                <img src="{{ asset('category_icon/キャップ.png') }}" alt="キャップ">
                <img src="{{ asset('category_icon/ケーブル類.png') }}" alt="ケーブル類">
                <img src="{{ asset('category_icon/トレー.png') }}" alt="トレー">
                <img src="{{ asset('category_icon/ビン.png') }}" alt="ビン">
                <img src="{{ asset('category_icon/ペットボトル.png') }}" alt="ペットボトル">
                <img src="{{ asset('category_icon/新聞紙.png') }}" alt="新聞紙">
                <img src="{{ asset('category_icon/小型製品.png') }}" alt="小型製品">
            </div>
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