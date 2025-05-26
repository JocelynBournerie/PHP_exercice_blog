<pre>
<?php

require_once './vendor/autoload.php';

use App\Entity\Author;
use App\Entity\Post;
use App\Entity\Visitor;

//Se connecter a la bdd
$dbConnection = new PDO (
    "mysql:host=localhost;dbname=blog;charset=UTF8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
$post = $dbConnection->query('SELECT * FROM post')->fetchAll();
var_dump($post);

//créer un auteur
//creer trois articles associés à l'auteur
//Afficher (via html les 3 articles)

$article1 = new Post("bonjour", "c'est un post pour dire bonnjour", new DateTime(), null, 'Jocelyn');
$article2 = new Post("Au revoir", "c'est un post pour dire au revoir", new DateTime(), null, 'Jocelyn');
$article3 = new Post("coucou", "c'est un post pour dire coucou", new DateTime(), null, 'Jocelyn');

$author = new Author();
$author->setFirstname("Jocelyn");
$author->setLastname("Bournerie");
$author->setPseudo('Jojolafrite');
$author->addpost($article1);
$author->addpost($article2);
$author->addpost($article3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    </body>
    <?php foreach ($post as $post) {
        ?>
    <article
     >
            <h2><?= $post['title'] ?></h2>
        <p><?= $post['content'] ?></p>
        <p><?= $post['author_id'] ?></p>
        <span><?= date_format(new DateTime($post['created_at']),"d/m/y")?></span>
        <hr>
    </article >
    <?php } 
    ?>
</html>
</pre>