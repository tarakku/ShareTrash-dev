<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title', 'ShareTrash')</title>
    @vite([
    'resources/js/create.js',
    'resources/js/app.js',
    'resources/js/detail.js',
    'resources/js/nav_underline_animation.js'])
</head>
<body>
    <div class="page-wrapper" >
        <x-header />

        {{-- トースト通知 --}}
        @if (session('success'))
            <div id="toast" class="toast-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div id="toast" class="toast-error">{{ session('error') }}</div>
        @else
            <div id="toast" style="display:none;"></div>
        @endif
        
        <main class="main-content" id="fade-in-element">
            @yield('content')
        </main>
        
        <x-footer />
    </div>
</body>
</html>