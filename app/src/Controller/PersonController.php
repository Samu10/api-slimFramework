<?php


namespace App\Controller;


use App\DAO\PersonDAO;
use App\Model\Person;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class PersonController extends AbstractController
{

    public function insert(Request $request, Response $response)
    {
        //Instanciation du DAO
        $dao = new PersonDAO($this->getPDO());

        //Instanciation du model
        $person = new Person();

        //Récupération des données dans un tableau associatif
        $data = json_decode($request->getBody()->getContents());

        //Hydratation de l'objet Person
        $person ->setName($data->name)
            ->setFirstName($data->firstName);

        //Insertion dans la BD
        $dao->insertOne($person);

        $result = ["success" => true, "id" => $person->getId()];

        // La réponse http
        $response->getBody()->write(json_encode($result));

        return $response;

    }
}