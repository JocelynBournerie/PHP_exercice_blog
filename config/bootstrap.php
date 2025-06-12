<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once './vendor/autoload.php';

$path = [
    dirname(__DIR__,1).'/src/Entity'
];
$isDevMode = false;

$conn = [
    'driver' => 'pdo_mysql',
    'user'=> 'root',
    'password'=>'',
    'dbname'=>'blog'
];

$config = ORMSetup::createAttributeMetadataConfiguration($path,$isDevMode);
$connection = DriverManager::getConnection($conn);
$entityManager = new EntityManager($connection,$config);