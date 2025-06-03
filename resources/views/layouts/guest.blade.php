<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/Header/index.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
    @vite(['resources/css/login.css','resources/css/register.css'])
    <title>ShereTrash</title>
</head>
<body class="fadeout">
    <div class="header">
        <div class="header_ShereTrash">
            <a href="{{ url('/') }}">=
                <img class="header_Shere_Trash_icon" src="{{ asset('images/Shere_Trash_icon.png') }}" alt="Shere_Trash_icon">
            </a>
            <a href="{{ url('/') }}">
                <h1>Shere Trash</h1>
            </a>
        </div> 
    </div>

    <div class="">
        {{-- コンテンツスロット: ここに各認証ビューのコンテンツが挿入されます --}}
        <div class="">
            {{ $slot }}
        </div>
    </div>
        
    <div class="footer"></div>
</body>
</html>