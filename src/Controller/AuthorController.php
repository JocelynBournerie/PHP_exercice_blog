<?php
namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class AuthorController{
    
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('./src/View');
        $this->twig = new Environment($loader,[
        'debug'=>true
]);
    }
    
    public function list() {
        //Récupérer les données
            //Récupérer le post repository
            $authorRepository = new AuthorRepository();
            
            $authors = $authorRepository->list();
        //Envoyer les données à la vue
        //Récupérer et envoyer la vue
        echo $this->twig->render('author/authorView.html.twig',[
            'authors'=>$authors
        ]);
    }
}