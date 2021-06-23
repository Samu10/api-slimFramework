<?php


namespace App\Controller;


abstract class AbstractController
{

    protected function getPDO(): \PDO
    {
        return new \PDO("mysql:host=localhost;dbname=formation_php;charset=utf8;port=3309", "root", "123",
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]
        );
    }
}