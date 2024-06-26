<?php

require_once 'bdd.php';
class MovieGenre extends Bdd
{

    private $genreId;
    private $movieId;

    public function __construct($genreId, $movieId)
    {
        Bdd::__construct();
        $this->genreId = $genreId;
        $this->movieId = $movieId;
    }

    // Getters and setters for id and name properties

    public function getGenreId()
    {
        return $this->genreId;
    }

    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }

    public function getMovieId()
    {
        return $this->movieId;
    }

    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }

    // Database methods

    public function addMovieGenre()
    {
        $req = $this->bdd->prepare('INSERT IGNORE INTO movie_genre (genreId, movieId) VALUES (:genreId, :movieId)');
        $req->execute(array('genreId' => $this->genreId, 'movieId' => $this->movieId));
    }

    public function getGenresByMovie($movieId)
    {
        $req = $this->bdd->prepare('SELECT genreId FROM movie_genre WHERE movieId =:movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetchAll();
    }

    public function getMoviesByGenre($genreId)
    {
        $req = $this->bdd->prepare('SELECT movieId FROM movie_genre WHERE genreId =:genreId');
        $req->execute(array('genreId' => $genreId));
        return $req->fetchAll();
    }

    public function getGenreByMovieId($movieId)
    {
        $req = $this->bdd->prepare('SELECT genreId FROM movie_genre WHERE movieId =:movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetchAll(PDO::FETCH_COLUMN);
    }
}
