<?php

class Genre extends Bdd{
    private $genreId;
    private $genreName;

    public function __construct($id, $name)
    {
        Bdd::__construct();
        $this->genreId = $id;
        $this->genreName = $name;
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

    public function save()
    {
        $req = $this->bdd->prepare('INSERT INTO GENRE (genreName) VALUES (:name)');
        $req->execute(array('name' => $this->genreName));
    }

}