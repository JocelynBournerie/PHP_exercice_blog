<pre>
<?php

require_once './vendor/autoload.php';

use App\Controller\PostContoller;
use App\Entity\Author;
use App\Entity\Post;
use App\Entity\Visitor;
use App\repository\PdoConnection;

//recup l'url
$url = $_SERVER['PATH_INFO'];
if (str_contains($url,'articles')){
        $postController = new PostContoller();
        $postController->list();
}

//Se connecter a la bdd
$dbConnection = PdoConnection::getConnection();
$post = $dbConnection->query('SELECT * FROM post')->fetchAll();

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
<body>    <ol><?php foreach ($post as $post) {
                ?>
        <li>
<h2><?= $post['title'] ?></h2>
        <span><?= $post['content'] ?></span>
        <span><?= $post['author_id'] ?></span>
        <span><?= date_format(new DateTime($post['created_at']), "d/m/y") ?></span>
        </li><?php }
                ?>
    </ol>
    </body>
</html>
</pre>