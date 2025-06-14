<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>@yield('title', 'ShareTrash')</title>
    @vite(['resources/css/header.css',
    'resources/css/footer.css',
    'resources/css/category.css',
    'resources/css/allpost.css',
    'resources/css/create.css',
    'resources/js/index.js',
    'resources/js/nav_underline_animation.js'])
</head>
<body>
    <div id="fade-in-element" class="hidden">
        <x-header />

        @yield('content')

        <x-footer />
    </div>
</body>
</html>