<?php

require_once 'bdd.php';
class Director extends Bdd
{
    private $directorId;
    private $directorName;
    private $directorImageUrl;

    // Constructor
    public function __construct($directorId, $directorName,$directorImageUrl)
    {
        Bdd::__construct();
        $this->directorId = $directorId;
        $this->directorName = $directorName;
        $this->directorImageUrl = $directorImageUrl;
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
        $req = $this->bdd->prepare('SELECT movieId FROM movie_director WHERE directorId =:directorId');
        $req->execute(array('directorId' => $directorId));
        return $req->fetchAll();
    }

    public function getDirectorById($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM director WHERE directorId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getAllDirectors()
    {
        $req = $this->bdd->prepare('SELECT * FROM director');
        $req->execute();
        return $req->fetchAll();
    }

    public function getDirectorIdByName($name)
    {
        $req = $this->bdd->prepare('SELECT directorId FROM director WHERE directorName =:name');
        $req->execute(array('name' => $name));
        return $req->fetch();
    }

    public function getDirectorNameById($id)
    {
        $req = $this->bdd->prepare('SELECT directorName FROM director WHERE directorId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getDirectorIdByMovieId($movieId)
    {
        $req = $this->bdd->prepare('SELECT directorId FROM movie_director WHERE movieId =:movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetch();
    }

    public function save()
    {
        $req = $this->bdd->prepare('INSERT INTO director (directorName) VALUES (:name)');
        $req->execute(array('name' => $this->directorName));
    }

    public function addDirector()
    {
        $req = $this->bdd->prepare('INSERT IGNORE INTO director (directorId, directorName, directorImageUrl) VALUES (:directorId, :directorName, :directorImageUrl)');
        return $req->execute(array('directorId' => $this->directorId, 'directorName' => $this->directorName, 'directorImageUrl' => $this->directorImageUrl));
    }

    public function delete()
    {
        $req = $this->bdd->prepare('DELETE FROM director WHERE directorId =:id');
        $req->execute(array('id' => $this->directorId));
    }
}
