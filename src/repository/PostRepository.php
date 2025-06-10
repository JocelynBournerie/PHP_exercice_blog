<?php

namespace App\Repository;
use App\Entity\Post;
use PDO;

class PostRepository
{
    public function list()
    {
        //Se connect a la bdd
        $dbConnection = PdoConnection::getConnection();
        //Execute la requete pour récupérer les données
        $post = $dbConnection->query('SELECT * FROM post')->fetchAll(PDO::FETCH_CLASS,Post::class);
        var_dump($post);
        die();
    }
}
