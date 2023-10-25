<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        @include('base.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('base.footer')
    </footer>
</body>
</html>