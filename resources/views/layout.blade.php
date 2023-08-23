<!DOCTYPE html>
<title>
    My blog
</title>
<link rel="stylesheet" href="/css/app.css">
{{-- <script src="/js/app.js"></script> --}}
<body>
    <header>
        @yield('banner')
    </header>

    @yield('content')
</body>