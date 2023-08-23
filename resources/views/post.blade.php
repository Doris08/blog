<!DOCTYPE html>
<title>
    My blog
</title>
<link rel="stylesheet" href="/css/app.css">
{{-- <script src="/js/app.js"></script> --}}
<body>

    <article>
        <h1>
            <?= $post->title; ?>
        </h1>
        <div>
            <?= $post->body; ?>
        </div>
    </article>

    <a href="/">Go back</a>

</body>