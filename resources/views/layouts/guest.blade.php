<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js',])
    <title>ShereTrash</title>
</head>
<body class="fadeout">
    <div class="wrapper">
        <div class="header">
            <div class="header_ShereTrash">
                <a href="{{ route('category') }}" class="top-button">
                    トップへ戻る
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
    </div>
</body>
</html>