
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



if(str_contains($url,'articles') && array_key_exists('action',$_REQUEST) && $_REQUEST['action']==='new'){
        $authorController = new PostContoller();
        $authorController->new();
}

if (str_contains($url,'articles') && array_key_exists('id',$_REQUEST)){
        $postController = new PostContoller();
        $postController->showArticle();
}

if (str_contains($url,'articles') && !$_REQUEST){
        $postController = new PostContoller();
        $postController->list();
}

if(str_contains($url,'authors') && array_key_exists('action',$_REQUEST) && $_REQUEST['action']==='new'){
        $authorController = new AuthorController();
        $authorController->new();
}

if(str_contains($url,'authors') && array_key_exists('id',$_REQUEST)){
        $authorController = new AuthorController();
        $authorController->show();
}

if(str_contains($url,'authors') && !$_REQUEST){
        $authorController = new AuthorController();
        $authorController->show();
}

// Créer le lien vers le formulaire
// Afficher le formulaire
// Envoyer et traiter le formulaire
// Rediger vers la page de liste des entités

?>

