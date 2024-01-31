<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ShopNest</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <center>
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/apple-touch-icon.png') }}" width="50px" height="50px" style="margin-left: 20px;">
            <span style="vertical-align: middle; font-family: 'oswald'; font-size: 30px; color: black;">ShopNest</span>
        </a>
    </center>

    <main>
        @yield('content')
    </main>

    <footer class="text-center bg-dark py-3">
        <div class="container-fluid bg-dark">
            <p class="text-light">ShopNest &copy; 2024. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
