<?php

class MovieDirector extends Bdd{

    private $movieId;
    private $directorId;

    public function __construct($movieId, $directorId)
    {
        Bdd::__construct();
        $this->movieId = $movieId;
        $this->directorId = $directorId;
    }

    // Getters and setters for id and name properties

    public function getMovieId()
    {
        return $this->movieId;
    }

    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }

    public function getDirectorId()
    {
        return $this->directorId;
    }

    public function setDirectorId($directorId)
    {
        $this->directorId = $directorId;
    }

    // Database methods

    public function getDirectorByMovieId($movieId)
    {
        $req = $this->bdd->prepare('SELECT directorId FROM movie_director WHERE movieId =:movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetch();
    }

    public function getMoviesByDirector($directorId)
    {
        $req = $this->bdd->prepare('SELECT movieId FROM movie_director WHERE directorId =:directorId');
        $req->execute(array('directorId' => $directorId));
        return $req->fetchAll();
    }
}