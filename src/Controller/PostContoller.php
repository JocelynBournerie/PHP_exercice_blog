<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Post;
use App\Repository\AuthorRepository;
use App\Repository\PostRepository;
use DateTime;
use Doctrine\ORM\EntityManager;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PostContoller
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

    public function list()
    {
        //Récupérer les données
        //Récupérer le post repository
        $postRepository = new PostRepository($this->entityManager);
        // $posts = $this->entityManager
        //     ->getRepository(Post::class)
        //     ->findAll();
        $posts = $postRepository->findAllWithAuthor();
        // echo '<pre>';
        // var_dump($posts);
        //Envoyer les données à la vue
        //Récupérer et envoyer la vue
        echo $this->twig->render('/post/listView.html.twig', [
            'posts' => $posts
        ]);
    }

    public function showArticle(){
        $postRepository = new PostRepository($this->entityManager);
        $post = $postRepository->findOneWithId($_REQUEST['id'])[0];
        // echo '<pre>';
        // var_dump($post);
        // die();
        echo $this->twig->render('/post/showArticleView.html.twig', [
            'post' => $post
        ]);
    }

    public function new()
    {
        $post = new Post();
        $authors = new AuthorRepository($this->entityManager);
        $authors = $authors->findAll();
        // echo '<pre>';
        // var_dump($authors);
        if ($_POST) {
            $postAuthor = new AuthorRepository($this->entityManager);
            $postAuthor = $postAuthor->findOneWithId($_POST['author_id'])[0];
            $post->setTitle($_POST['title']);
            $post->setContent($_POST['content']);
            $post->setCreatedAt(new DateTime());
            $post->setPublishedAt(new DateTime());
            $post->setAuthor($postAuthor);
            $this->entityManager->persist($post);
            $this->entityManager->flush();
            header('Location: articles');
        }
        echo $this->twig->render('post/new.html.twig', [
            'authors' => $authors
        ]);
    }
}
