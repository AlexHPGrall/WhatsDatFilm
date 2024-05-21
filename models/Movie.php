<?php

require_once 'bdd.php';
class Movie extends Bdd{
    private $id;
    private $movieId;
    private $movieTitle;
    private $frenchTitle;
    private $runtime;
    private $releaseDate;
    private $movieImageUrl;
    private $movieRating;

    public function __construct()
    {
        parent::__construct();
    }

    // Getters and setters for the properties

    public function getMovieId()
    {
        return $this->movieId;
    }

    public function getTitle()
    {
        return $this->movieTitle;
    }

    public function setMovieId($id)
    {
        $this->movieId = $id;
    }

    public function setTitle($title)
    {
        $this->movieTitle = $title;
    }

    public function getFrenchTitle()
    {
        return $this->frenchTitle;
    }

    public function setFrenchTitle($frenchTitle)
    {
        $this->frenchTitle = $frenchTitle;
    }

    public function getRuntime()
    {
        return $this->runtime;
    }

    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    public function getImageUrl()
    {
        return $this->movieImageUrl;
    }

    public function setImageUrl($imageUrl)
    {
        $this->movieImageUrl = $imageUrl;
    }

    public function getRating()
    {
        return $this->movieRating;
    }

    public function setRating($rating)
    {
        $this->movieRating = $rating;
    }

    // Other methods for database operations (e.g., save, delete, etc.)

    public function readMovie()
    {
        $req = $this->bdd->prepare('SELECT * FROM movie WHERE movieId = :id');
        $req->execute(array('id' => $this->movieId));
        $donnees = $req->fetch();
        if ($donnees) {
            $this->movieTitle = $donnees['movieTitle'];
            $this->frenchTitle = $donnees['frenchTitle'];
            $this->runtime = $donnees['runtime'];
            $this->releaseDate = $donnees['releaseDate'];
            $this->movieImageUrl = $donnees['movieImageUrl'];
            $this->movieRating = $donnees['movieRating'];
        }
    }

    public function getAllMovies()
    {
        $req = $this->bdd->prepare('SELECT * FROM movie');
        $req->execute();
        return $req->fetchAll();
    }

    public function getMovieById($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM movie WHERE movieId = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function addMovie()
    {
        $req = $this->bdd->prepare('INSERT INTO movie (movieId, movieTitle, frenchTitle, runtime, releaseDate, movieImageUrl, movieRating) VALUES (:movieId, :title, :frenchTitle, :runtime, :releaseDate, :imageUrl, :rating)');
        return $req->execute(array('movieId' => $this->movieId, 'title' => $this->movieTitle, 'frenchTitle' => $this->frenchTitle, 'runtime' => $this->runtime, 'releaseDate' => $this->releaseDate, 'imageUrl' => $this->movieImageUrl, 'rating' => $this->movieRating));
    }

    public function updateMovie()
    {
        $req = $this->bdd->prepare('UPDATE movie SET movieTitle = :title, frenchTitle = :frenchTitle, runtime = :runtime, releaseDate = :releaseDate, movieImageUrl = :imageUrl, movieRating = :rating WHERE movieId = :id');
        $req->execute(array('title' => $this->movieTitle, 'frenchTitle' => $this->frenchTitle, 'runtime' => $this->runtime, 'releaseDate' => $this->releaseDate, 'imageUrl' => $this->movieImageUrl, 'rating' => $this->movieRating, 'id' => $this->movieId));
    }

    public function deleteMovie()
    {
        $req = $this->bdd->prepare('DELETE FROM movie WHERE movieId = :id');
        $req->execute(array('id' => $this->movieId));
    }

    public function deleteMovieFromId($id)
    {
        $req = $this->bdd->prepare('DELETE FROM Movie WHERE movieId = :id');
        $req->execute(array(
            'id' => $id
        ));
    }
    public function getMovieActors($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM Actor A JOIN ActingCredit AC ON A.actorId = AC.actorId WHERE AC.movieId = :id');
        $req->execute(array(
            'id' => $id
        ));
        return $req->fetchAll();
    }

    public function getMatchingMovies($movieTitle)
    {

        $req = $this->bdd->prepare('SELECT * FROM Movies WHERE title LIKE :title ;');
        $req->execute(array(
            'title' => $movieTitle
        ));
        return $req->fetchAll();
    }
}
