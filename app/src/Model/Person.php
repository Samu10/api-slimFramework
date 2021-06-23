<?php


namespace App\Model;


class Person
//permet de definir la structure des données et les stocker
{
    private int $id;
    private string $firstName;
    private string $name;

    /**
     * Person constructor.
     */
    public function __construct()
    {

    }
//definir tous ce dont j'ai besoin pour caractérise une personne

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Person
     */
    public function setId(int $id): Person
    {
        $this->id = $id;
        return $this;
    }



    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Person
     */
    public function setFirstName(string $firstName): Person
    {
        $this->firstName = $firstName;
        return $this;
    }



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Person
     */
    public function setName(string $name): Person
    {
        $this->name = $name;
        return $this;
    }


    //permet de retourner le prénom et le nom en majuscule
    public function getFullName(){
        return $this->firstName. " ". strtoupper($this->name);
    }


}