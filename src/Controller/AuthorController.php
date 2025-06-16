<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Doctrine\ORM\EntityManager;

class AuthorController
{

    private EntityManager $entityManager;
    private $twig;

    public function __construct()
    {
        require_once dirname(__DIR__, 2) . '/config/bootstrap.php';
        $this->entityManager = $entityManager;

        $loader = new FilesystemLoader('./src/View');
        $this->twig = new Environment($loader, [
            'debug' => true
        ]);
    }

    // public function list()
    // {
    //     //Récupérer les données
    //     //Récupérer le post repository
    //     $authorRepository = new AuthorRepository();
    //     $authors = $this->entityManager
    //         ->getRepository(Author::class)
    //         ->findAll();

    //     // $authors = $authorRepository->list();
    //     //Envoyer les données à la vue
    //     //Récupérer et envoyer la vue
    //     echo $this->twig->render('author/authorView.html.twig', [
    //         'authors' => $authors
    //     ]);
    // }

    public function show()
    {
        $authorRepository = new AuthorRepository($this->entityManager);
        $id = $_REQUEST['id']?? '';
 

        if ($id) {
            $author = $authorRepository->findOneWithPost($id);
            // echo "<pre>";
            // var_dump($author);
            $author = $author[0] ?? '';
            if ($author){
                echo $this->twig->render('author/authorPost.html.twig', ['author' => $author]);
            }
            if (!$author){
                echo $this->twig->render('author/authorPostNotExists.html.twig');
            }
        }
        if (!$id) {
            $authors = $authorRepository->findAll();
            echo $this->twig->render('author/authorView.html.twig', [
                'authors' => $authors
            ]);
        }
    }

    public function new(){
        if($_POST){
            $author = new Author();
            $author-> setFirstname($_POST['firstname']);
            $author-> setLastname($_POST['lastname']);
            $author-> setEmail($_POST['mail']);
            $author->setJob($_POST['job']);
            $this->entityManager->persist($author);
            $this->entityManager->flush();
            header('Location: /blog/authors');
        }
        echo $this->twig->render('author/new.html.twig');
    }
}
