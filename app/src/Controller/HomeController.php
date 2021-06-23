<?php


namespace App\Controller;


use Slim\Psr7\Response;

class HomeController
{

    public function test(Response $response){
        $response->getBody()->write("Un test");
        return $response;
    }


    public function hello(Response $response, $name){
        $response->getBody()->write("Hello $name");
        return $response;
    }


    public  function  addition(Response $response, $n1, $n2){
        $result = $n1 + $n2;

        $response->getBody()->write("Le résultat est: " . $result);
        return $response;
    }
}