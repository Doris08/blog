<!DOCTYPE html>
<title>
    My blog
</title>
<link rel="stylesheet" href="/css/app.css">
{{-- <script src="/js/app.js"></script> --}}
<body>
    @foreach ($posts as $post) {{--<?php foreach ($posts as $post) : ?>--}}
        {{--@dd($loop)--}} {{-- Nos da acceso a una variable loop con informacón acerca del loop --}}
        <article class="{{ $loop->even ? 'foobar' : '' }}"> {{-- La variable loop puede servir para algo como esto y más --}}

            <h1>
                <a href="/posts/{{ $post->slug }}{{--<?= $post->slug; ?>--}}">
                    {{-- <?= $post->title; ?> --}} {{-- Forma de hacerlo en php sin usar blade --}}
                    {{ $post->title }} {{-- Forma usando blade --}}
                </a>
            </h1>

            <div>
                {{-- <?= $post->excerpt; ?> --}} {{-- Forma de hacerlo en php sin usar blade --}}
                {{ $post->excerpt }} {{-- Forma usando blade --}}
            </div>

        </article>
    @endforeach {{--<?php endforeach; ?>--}}
</body>