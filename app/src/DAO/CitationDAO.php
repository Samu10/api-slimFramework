<?php


namespace App\DAO;


use App\Model\Citation;
use PDO;

class CitationDAO extends AbstractDAO
{
    /**
     * CitationDAO constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "citations");
    }


    /** Insertion d'un objet Citation dans la BD
     * @param Citation $citation
     */
    public function insertOne(Citation $citation)
    {
        $sql = "INSERT INTO citations (texte, auteur) VALUES (?,?)";

        //tableau ordinal
        $data = [$citation->getTexte(), $citation->getAuteur()];

        $this->doInsert($sql, $data, $citation);
    }


    /** Mise à jour d'un objet Citation dans la BD
     * @param Citation $citation
     */
    public function updateOne(Citation $citation)
    {
        $sql = "UPDATE citations SET texte=?, auteur=? WHERE id=?";

        $data = [$citation->getTexte(), $citation->getAuteur(), $citation->getId()];

        $this->doExecute($sql, $data);
    }



    public function getRecherche(string $term)
    {
        $sql = "SELECT * FROM citations WHERE texte LIKE :term OR auteur LIKE :term";

      //  $data= ["term" =>"%{$term}%"];

        $statement = $this->pdo->prepare($sql);

        $statement->execute(["term" => "%$term%"]);

        return $statement->fetchAll();
    }


}