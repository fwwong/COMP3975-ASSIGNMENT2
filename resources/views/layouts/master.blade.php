<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>A2 @yield('title')</title>
</head>

<body>
    <header
        style="width: 100%; margin: auto; background-color: #a9be7b; height:60px;border-radius:4px;position:fixed;top:0;display: flex; align-items: center;">
    </header>
    <div class="container" style="padding-top:60px;padding-bottom:50px;">
        @yield('content')
    </div>
    <footer>
        <div>
            <li>Muyang Li(A01352306)</li>
            <li>Fiona</li>
        </div>
    </footer>
</body>
</html>
