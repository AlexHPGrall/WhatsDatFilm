<?php

class Director extends Bdd
{
    private $directorId;
    private $directorName;

    // Constructor
    public function __construct($id, $name)
    {
        Bdd::__construct();
        $this->directorId = $id;
        $this->directorName = $name;
    }

    // Getters and Setters

    public function getId()
    {
        return $this->directorId;
    }

    public function getName()
    {
        return $this->directorName;
    }

    public function setName($name)
    {
        $this->directorName = $name;
    }

    // Database methods

    public function getMoviesByDirector($directorId)
    {
        $req = $this->bdd->prepare('SELECT movieId FROM MOVIEDIRECTOR WHERE directorId =:directorId');
        $req->execute(array('directorId' => $directorId));
        return $req->fetchAll();
    }

    public function getDirectorById($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM DIRECTOR WHERE directorId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getAllDirectors()
    {
        $req = $this->bdd->prepare('SELECT * FROM DIRECTOR');
        $req->execute();
        return $req->fetchAll();
    }

    public function getDirectorIdByName($name)
    {
        $req = $this->bdd->prepare('SELECT directorId FROM DIRECTOR WHERE directorName =:name');
        $req->execute(array('name' => $name));
        return $req->fetch();
    }

    public function getDirectorNameById($id)
    {
        $req = $this->bdd->prepare('SELECT directorName FROM DIRECTOR WHERE directorId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getDirectorIdByMovieId($movieId)
    {
        $req = $this->bdd->prepare('SELECT directorId FROM MOVIEDIRECTOR WHERE movieId =:movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetch();
    }

    public function save()
    {
        $req = $this->bdd->prepare('INSERT INTO DIRECTOR (directorName) VALUES (:name)');
        $req->execute(array('name' => $this->directorName));
    }

    public function delete()
    {
        $req = $this->bdd->prepare('DELETE FROM DIRECTOR WHERE directorId =:id');
        $req->execute(array('id' => $this->directorId));
    }
}
