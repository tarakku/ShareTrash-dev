<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ShareTrash')</title>
    <link rel="stylesheet" href="{{ asset('css/index_style.css') }}" />
    @vite(['resources/css/header.css','resources/css/footer.css', 'resources/css/category.css', 'resources/js/index.js'])
</head>
<body>
    <div id="fade-in-element" class="hidden">
        <x-header />

        @yield('content')

        <x-footer />
    </div>
</body>
</html>