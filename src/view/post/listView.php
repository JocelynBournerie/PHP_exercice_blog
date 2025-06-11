<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ol><?php foreach ($posts as $post) {
        ?>
            <li>
                <h2><?= $post->getTitle() ?></h2>
                <span><?= $post->getContent() ?></span>
                <span><?= $post->getAuthor() ?></span>
                <span>Créé le : <?= $post->getCreatedAt()->format("d/m/Y")  ?></span>
            </li><?php }
                    ?>
    </ol>
</body>

</html>