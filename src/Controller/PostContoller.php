<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManager;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PostContoller{
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
            $postRepository = new PostRepository();
            // $posts = $this->entityManager
            //     ->getRepository(Post::class)
            //     ->findAll();
            $posts = $postRepository->findAllWithAuthor();
            // echo '<pre>';
            // var_dump($posts);
        //Envoyer les données à la vue
        //Récupérer et envoyer la vue
        echo $this->twig->render('/post/listView.html.twig',[
            'posts'=>$posts
        ]);
    }
}