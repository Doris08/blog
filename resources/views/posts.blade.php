<!DOCTYPE html>
<title>
    My blog
</title>
<link rel="stylesheet" href="/css/app.css">
{{-- <script src="/js/app.js"></script> --}}
<body>
    <?php foreach ($posts as $post) : ?>
        <article>

            <h1>
                <a href="/posts/<?= $post->slug; ?>">
                    <?= $post->title; ?>
                </a>
            </h1>

            <div>
                <?= $post->excerpt; ?>
            </div>

        </article>
    <?php endforeach; ?>
</body>