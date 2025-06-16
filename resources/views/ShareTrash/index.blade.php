<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0",
            maximum-scale="1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index_style.css" />
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    <!--ここからヘッダー-->
    <header>
        <div class="Shere_Trash_icon">
            <img src="./header_images/Shere_Trash_icon.png" alt="Shere_Trash_icon">
            <h1>ShareTrash</h1>
        </div>    
        <nav>
            <ul>
                <li><button id="toggleButton" class="style-none">forum</button></li>
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

        <!-- ここから問い合わせフォーム -->
        <div id="toggleElement" class="modal" style="display: none;">
            <div class="forum">
                <div class="form-table">
                    <button class="close-button" aria-label="閉じる">×</button>
                    <h2 class="form-header">お問い合わせフォーム</h2>
                    <div class="form-row">
                        <label>メールアドレス</label>
                        <input type="email" placeholder="example@gmail.com">
                    </div>
                    <div class="form-row">
                        <label>お問い合わせ内容</label>
                        <textarea placeholder="お問い合わせ内容を入力してください"></textarea>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="forum-button" name="button">送信</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ここまで問い合わせフォーム -->

        <p>&copy; 2023 Your Company Name. All rights reserved.</p>
        <nav>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <div class="social-links">
            <a href="#"><img src="social-icon-facebook.png" alt="Facebook"></a>
            <a href="#"><img src="social-icon-twitter.png" alt="Twitter"></a>
            <a href="#"><img src="social-icon-instagram.png" alt="Instagram"></a>
        </div>
    </footer>
    <!--ここまでフッター-->
</body>
</html>