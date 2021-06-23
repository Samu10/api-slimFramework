<?php


namespace App\Model;


class Citation
{
    private int $id;
    private string $texte;
    private string $auteur;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Citation
     */
    public function setId(int $id): Citation
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexte(): string
    {
        return $this->texte;
    }

    /**
     * @param string $texte
     * @return Citation
     */
    public function setTexte(string $texte): Citation
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     * @return Citation
     */
    public function setAuteur(string $auteur): Citation
    {
        $this->auteur = $auteur;
        return $this;
    }





    }