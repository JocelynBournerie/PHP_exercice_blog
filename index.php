
<?php

require_once './vendor/autoload.php';

use App\Controller\AuthorController;
use App\Controller\PostContoller;
use App\Entity\Author;
use App\Entity\Post;
use App\Entity\Visitor;
use App\repository\PdoConnection;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

//recup l'url
$url = $_SERVER['REQUEST_URI'];

if (str_contains($url,'articles')){
        $postController = new PostContoller();
        $postController->list();
}
if(str_contains($url,'authors')){
        $authorController = new AuthorController();
        $authorController->list();
}

//ajouter 3 users dans la BDD
//ajouter 3 authors dans la BDD
//Modifier le code dans PostController pour récupérer les données 
//Modifier le code dans PostRepository pour récupérer les données 

?>

