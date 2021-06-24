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
        $person->setName($data->name)
            ->setFirstName($data->firstName);

        //Insertion dans la BD
        $dao->insertOne($person);

        $result = ["success" => true, "id" => $person->getId()];

        // La réponse http
        $response->getBody()->write(json_encode($result));

        return $response;
    }



    public function deletePerson(Response $response, $id)
    {
        // $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        //Instanciation du DAO
        $dao = new PersonDAO($this->getPDO());

        //Requête suppression d'une personne
        $result = $dao->deleteOneById($id);

        // La réponse http
        $response->getBody()->write($result . " personne supprimée");

        return $response;
    }



    public function person(Response $response, $id)
    {

        //Instanciation du DAO
        $dao = new PersonDAO($this->getPDO());

        //Requête afficher une personne
        $result = $dao->findOneById($id);

        //Transforme un tableau d'objet en json
        $json = json_encode($result);

        $response->getBody()->write($json);

        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }



    public function personAll(Response $response)
    {

        //Instanciation du DAO
        $dao = new PersonDAO($this->getPDO());

        //Requête affichage de la liste des personnes
        $result = $dao->findAll();

        //Transforme un tableau d'objet en json
        $json = json_encode($result);

        $response->getBody()->write($json);

        return $response->withHeader("Content-type", "application/json")->withStatus(200);
    }



    public function updatePerson(Request $request, Response $response, $id)
    {

        //Instanciation du DAO
        $dao = new PersonDAO($this->getPDO());

        //Instanciation du model
        $person = new Person();

        //Récupération des données dans un tableau associatif
        $data = json_decode($request->getBody()->getContents());

        //Hydratation de l'objet Person
        $person->setName($data->name)
            ->setFirstName($data->firstName)
            ->setId($id);

        //Modification dans la BD
        $dao->updateOne($person);

        $result = ["success" => true, "id" => $person->getId()];

        // La réponse http
        $response->getBody()->write(json_encode($result));

        return $response;
    }

}