<?php
namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;

class AuthorController{
    
    public function list() {
        //Récupérer les données
            //Récupérer le post repository
            $authorRepository = new AuthorRepository();
            $authors = $authorRepository->list();
        //Envoyer les données à la vue
        //Récupérer et envoyer la vue
        include '/xampp/htdocs/BLOG/src/view/post/authorView.php';
    }
}