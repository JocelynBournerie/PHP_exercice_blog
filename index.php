
<?php

require_once './vendor/autoload.php';

use App\Controller\AuthorController;
use App\Controller\PostContoller;
use App\Entity\Author;
use App\Entity\Post;
use App\Entity\Visitor;
use App\repository\PdoConnection;

//recup l'url
$url = $_SERVER['REQUEST_URI'];
var_dump($url);

if (str_contains($url,'articles')){
        $postController = new PostContoller();
        $postController->list();
}
if(str_contains($url,'authors')){
        $authorController = new AuthorController();
        $authorController->list();
}

//Ajouter quelques auteurs dans la base de données
//Créer un controller pour gérer les auteurs (AuthorController)
//Créer la méthode list pour gérer la route "/authors" qui affiche la list des auteurs
//Créer le AuthorRepository et la méthode list pour récupérer la liste des auteurs
//Créer et renvoyer la view affichant la liste des auteurs

?>

