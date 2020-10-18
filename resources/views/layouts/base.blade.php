<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}@yield('title')</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="@yield('javascript')"></script>

        <script src="/js/ckeditor/adapters/jquery.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" type="text/css" href="/semantic/dist/semantic.min.css">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>
