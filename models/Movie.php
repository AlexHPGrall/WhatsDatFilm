<?php

include("Bdd.php");

class Movie extends Bdd{
    private $movieId;
    private $movieTitle;
    private $frenchTitle;
    private $runtime;
    private $releaseDate;
    private $movieImageUrl;
    private $movieRating;
    
    public function __construct() {
        Bdd::__construct();
    }
    
    // Getters and setters for the properties
    
    public function getId() {
        return $this->movieId;
    }
    
    public function getTitle() {
        return $this->movieTitle;
    }
    
    public function setTitle($title) {
        $this->movieTitle = $title;
    }

    public function getFrenchTitle() {
        return $this->frenchTitle;
    }

    public function setFrenchTitle($frenchTitle) {
        $this->frenchTitle = $frenchTitle;
    }

    public function getRuntime() {
        return $this->runtime;
    }

    public function setRuntime($runtime) {
        $this->runtime = $runtime;
    }
    
    public function getReleaseDate() {
        return $this->releaseDate;
    }
    
    public function setReleaseDate($releaseDate) {
        $this->releaseDate = $releaseDate;
    }

    public function getImageUrl() {
        return $this->movieImageUrl;
    }

    public function setImageUrl($imageUrl) {
        $this->movieImageUrl = $imageUrl;
    }

    public function getRating() {
        return $this->movieRating;
    }

    public function setRating($rating) {
        $this->movieRating = $rating;
    }
    
    // Other methods for database operations (e.g., save, delete, etc.)

    public function getAllMovies() {
        $req = $this->bdd->prepare('SELECT * FROM movie');
        $req->execute();
        return $req->fetchAll();
    }

    public function getMovieById($id) {
        $req = $this->bdd->prepare('SELECT * FROM movie WHERE movieId = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function addMovie() {
        $req = $this->bdd->prepare('INSERT INTO movie (movieTitle, frenchTitle, runtime, releaseDate, movieImageUrl, movieRating) VALUES (:title, :frenchTitle, :runtime, :releaseDate, :imageUrl, :rating)');
        $req->execute(array('title' => $this->movieTitle, 'frenchTitle' => $this->frenchTitle, 'runtime' => $this->runtime, 'releaseDate' => $this->releaseDate, 'imageUrl' => $this->movieImageUrl, 'rating' => $this->movieRating));
    }

    public function updateMovie() {
        $req = $this->bdd->prepare('UPDATE movie SET movieTitle = :title, frenchTitle = :frenchTitle, runtime = :runtime, releaseDate = :releaseDate, movieImageUrl = :imageUrl, movieRating = :rating WHERE movieId = :id');
        $req->execute(array('title' => $this->movieTitle, 'frenchTitle' => $this->frenchTitle, 'runtime' => $this->runtime, 'releaseDate' => $this->releaseDate, 'imageUrl' => $this->movieImageUrl, 'rating' => $this->movieRating, 'id' => $this->movieId));
    }

    public function deleteMovie() {
        $req = $this->bdd->prepare('DELETE FROM movie WHERE movieId = :id');
        $req->execute(array('id' => $this->movieId));
    }
}

?>