<?php
//gérer les msg errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

//intégrer l'auto-chargement
require "../vendor/autoload.php";


//Création du conteneur de dépendances
$builder = new ContainerBuilder();
$container = $builder->build();


//Création de l'application
//avec la classe Bridge qui permet de passer un container en argument
$app = Bridge::create($container);


//Création des routes
$app->get("/test", [\App\Controller\HomeController::class, "test"]);


$app->get("/hello/{name}", [\App\Controller\HomeController::class,"hello"]);


$app->get("/addition/{n1}/{n2}",[\App\Controller\HomeController::class,"addition"]);



//addition/5/6 =>11

$app->get("/user", function (Request $request, Response $response) {
    $user = ["userName" => "Joe User", "role" => "user", "id" => 1];

    //Transforme un tableau d'objet en json
    $json = json_encode($user);

    $response->getBody()->write($json);

    return $response->withHeader("Content-type", "application/json")->withStatus(200);
});

/***********************************
 * API Personnes
 *************************************/

$app->post("/person", [\App\Controller\PersonController::class, "insert"]);

$app->delete("/person/{id}",[\App\Controller\PersonController::class,"deletePerson"]);

$app->get("/person/{id}",[\App\Controller\PersonController::class,"person"]);

$app->get("/person",[\App\Controller\PersonController::class,"personAll"]);

$app->put("/person/{id}",[\App\Controller\PersonController::class,"updatePerson"]);




//Lancement de l'application
$app->run();



