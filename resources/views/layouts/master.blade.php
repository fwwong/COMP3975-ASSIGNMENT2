<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootswatch darkly -->
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>A2 @yield('title')</title>
</head>

<body>
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">COMP3975 - A2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (Auth::check())
                <a href="{{ route('logout') }}" class="btn btn-danger mt-3">LOGOUT</a>
            @endif

    </nav>

    <!-- CONTENT -->
    <div class="container" style="padding-top:60px;padding-bottom:50px;">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Problem occurs<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>



    <!-- FOOTER -->
    <footer class="footer mt-auto py-3 bg-dark text-light">
        <div class="container text-center">
            <h6>&copy COMP3975 - A2 - Muyang Li(A01352306) - Fiona Wong(A01343107)</h6>
        </div>
    </footer>
</body>

</html>
