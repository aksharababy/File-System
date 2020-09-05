<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>

        <!-- Icons -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

        <!-- Main styles for this application -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Styles required by this views -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">  
    </head>
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
        @yield('content')

        <!-- Bootstrap and necessary plugins -->
        <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
        <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    </body>
</html>