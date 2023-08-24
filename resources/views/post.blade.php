<x-layout>

    <x-slot name="content">
        <article>
            <h1>
                {{-- <?= $post->title; ?> --}} {{-- Forma de hacerlo en php sin usar blade --}}
                {!! $post->title !!} {{-- Forma usando blade para escapar contenido HTML --}}
            </h1>
            <div>
                {{-- <?= $post->body; ?> --}} {{-- Forma de hacerlo en php sin usar blade --}}
                {!! $post->body !!} {{-- Forma usando blade para escapar contenido HTML --}}
            </div>
        </article>

        <a href="/">Go back</a>
    </x-slot>   

</x-layout>
