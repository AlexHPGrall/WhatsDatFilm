<?php

require_once 'bdd.php';
class Genre extends Bdd
{
    private $genreId;
    private $genreName;

    public function __construct($genreId, $genreName)
    {
        Bdd::__construct();
        $this->genreId = $genreId;
        $this->genreName = $genreName;
    }

    // Getters and Setters

    public function getId()
    {
        return $this->genreId;
    }

    public function getName()
    {
        return $this->genreName;
    }

    public function setName($name)
    {
        $this->genreName = $name;
    }

    // Database methods

    public function getMoviesByGenre($genreId)
    {
        $req = $this->bdd->prepare('SELECT movieId FROM MOVIEGENRE WHERE genreId =:genreId');
        $req->execute(array('genreId' => $genreId));
        return $req->fetchAll();
    }

    public function getGenreById($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM GENRE WHERE genreId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getAllGenres()
    {
        $req = $this->bdd->prepare('SELECT * FROM GENRE');
        $req->execute();
        return $req->fetchAll();
    }

    public function getGenreIdByName($name)
    {
        $req = $this->bdd->prepare('SELECT genreId FROM GENRE WHERE genreName =:name');
        $req->execute(array('name' => $name));
        return $req->fetch();
    }

    public function getGenreNameById($id)
    {
        $req = $this->bdd->prepare('SELECT genreName FROM GENRE WHERE genreId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function addGenre()
    {
        $req = $this->bdd->prepare('INSERT IGNORE INTO genre (genreId, genreName) VALUES (:genreId, :genreName)');
        $req->execute(array('genreId' => $this->genreId, 'genreName' => $this->genreName));
    }

    public function save()
    {
        $req = $this->bdd->prepare('INSERT INTO GENRE (genreName) VALUES (:name)');
        $req->execute(array('name' => $this->genreName));
    }
}
