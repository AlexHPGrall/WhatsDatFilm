<?php

require_once 'bdd.php';
class MovieOfTheDay extends Bdd
{

    private $movieId;
    private $date;

    public function __construct($date, $movieId)
    {
        Bdd::__construct();
        $this->movieId = $movieId;
        $this->date = $date;
    }

    // Getters and setters for id and name properties

    public function getDate()
    {
        return $this->movieId;
    }

    public function setDate($date)
    {
        $this->date = $date;
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

    public function selectMovieOfTheDay()
    {
        // Sélectionner un film aléatoire
        $stmt = $this->bdd->query('SELECT movieId FROM movie ORDER BY RAND() LIMIT 1');
        $film = $stmt->fetch();

        if ($film) {
            // Insérer dans la table movie_of_the_day
            $stmt = $this->bdd->prepare('INSERT INTO movie_of_the_day (movieId, date) VALUES (:movie_id, CURDATE())');
            $stmt->execute(['movieId' => $film['movieId']]);
        }
    }

    public function getMovieOfTheDay()
    {
        $stmt = $this->bdd->query('SELECT * FROM movie_of_the_day WHERE date = CURDATE()');
        return $stmt->fetch();
    }
}
