<?php

namespace App\Repository;

use App\Entity\Post;
use PDO;
use Doctrine\ORM\EntityManager;

class PostRepository
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        require_once dirname(__DIR__, 2) . '/config/bootstrap.php';
        $this->entityManager = $entityManager;
    }

    public function list()
    {
        //Se connect a la bdd
        $dbConnection = PdoConnection::getConnection();
        //Execute la requete pour récupérer les données
        $posts = $dbConnection->query('SELECT * FROM post')->fetchAll(PDO::FETCH_CLASS, Post::class);
        return $posts;
    }

    public function findAllWithAuthor()
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(['post', 'author'])
            ->from(Post::class, 'post')
            ->leftJoin('post.author', 'author');
        return $qb->getQuery()->getResult();
    }

    public function findOneWithId($id)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(['post', 'author'])
            ->from(Post::class, 'post')
            ->leftJoin('post.author', 'author')
            ->where('post.id=:id')
            ->setParameter('id', $id);
        // echo '<pre>';
        // var_dump($qb);

        return $qb->getQuery()->getResult();
    }
}
