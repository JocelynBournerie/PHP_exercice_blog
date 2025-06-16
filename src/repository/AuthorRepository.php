<?php

namespace App\Repository;

use App\Entity\Author;
use App\Entity\Post;
use PDO;
use Doctrine\ORM\EntityManager;

class AuthorRepository
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
        $authors = $dbConnection->query('SELECT * FROM author')->fetchAll(PDO::FETCH_CLASS, Author::class);
        return $authors;
    }

    public function findOneWithPost($id)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(['author', 'posts'])
            ->from(Author::class, 'author')
            ->leftJoin('author.posts', 'posts')
            ->where(['author.id= :id'])
            ->setParameter('id', $id);
        return $qb->getQuery()->getResult();
    }

    public function findOneWithId($id)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select(['author'])
            ->from(Author::class, 'author')
            ->where(['author.id=:id'])
            ->setParameter('id', $id);
        
        return $qb->getQuery()->getResult();
    }

    public function findAll()
    {
        $authors = $this->entityManager
            ->getRepository(Author::class)
            ->findAll();
        return $authors;
    }
}
