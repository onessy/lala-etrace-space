<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        fieldset {
            -webkit-border-radius: 8px !important;
            -moz-border-radius: 8px !important;
            border-radius: 8px !important;
        }
        .nav-link
        {
            color: white !important;
        }
        .nav-link:hover
        {
            color: yellow !important;
            margin-top: 7px !important;
            font-weight: bold !important;
        }

        .new
        {
            border-bottom: 1px  #0000EE;
            margin-top: 2px !important;
            margin-bottom: 5px !important;
        }
        .card-link:hover
        {
            color: yellowgreen !important;
        }
        .home
        {
            padding: 4px !important;
            font-family: "Times New Roman", fantasy;
            font-size: 16px !important;
        }
        .info
        {
            padding: 4px !important;
            font-family: "Times New Roman", monospace ;
            font-size: 16px !important;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('template.nav')
        @include('template.alert')
        <main class="h-100 py-4">
            @yield('content')
        </main>
        <br>
        <br>
        @include('template.footer')
    </div>
</body>
</html>
