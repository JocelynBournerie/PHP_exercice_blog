<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ol><?php foreach ($authors as $author) {
        ?>
            <li>
                <h2><?= $author->getFirstname() ?> <?= $author->getLastname() ?></h2>
            </li><?php }
                    ?>
    </ol>
</body>

</html>