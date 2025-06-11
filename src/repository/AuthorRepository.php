<?php

namespace App\Repository;
use App\Entity\Author;
use PDO;

class AuthorRepository
{
    public function list()
    {
        //Se connect a la bdd
        $dbConnection = PdoConnection::getConnection();
        //Execute la requete pour récupérer les données
        $authors = $dbConnection->query('SELECT * FROM author')->fetchAll(PDO::FETCH_CLASS,Author::class);
        return $authors;
    }
}
