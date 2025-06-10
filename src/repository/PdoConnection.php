<?php

namespace App\Repository;
use App\Entity\Post;
use PDO;

class PdoConnection{

    private static $connection;

    private function __construct()
    {
        
    }

    public static function getConnection(){
        if(self::$connection === null){
            self::$connection = new  PDO (
    "mysql:host=localhost;dbname=blog;charset=UTF8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
    }
    return self::$connection;
    }
}