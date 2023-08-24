<!DOCTYPE html>
<title>
    My blog
</title>
<link rel="stylesheet" href="/css/app.css">
{{-- <script src="/js/app.js"></script> --}}
<body>
    {{--<header>
        @yield('banner') {{-- Usando directivas (Solo podemos usar una u otra no combinar las dos formas) --}}
    {{--</header>--}}

    {{ $content }} {{-- Ahora es un blade component pero podría seguirse usando @yield('content') --}}
</body>