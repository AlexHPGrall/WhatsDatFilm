<?php

require_once 'bdd.php';
class Movie extends Bdd{
    private $movieId;
    private $movieTitle;
    private $frenchTitle;
    private $runtime;
    private $releaseDate;
    private $movieImageUrl;
    private $movieRating;

    public function __construct($movieId, $movieTitle, $frenchTitle, $runtime, $releaseDate, $movieImageUrl, $movieRating)
    {
        Bdd::__construct();
        $this->movieId = $movieId;
        $this->movieTitle = $movieTitle;
        $this->frenchTitle = $frenchTitle;
        $this->runtime = $runtime;
        $this->releaseDate = $releaseDate;
        $this->movieImageUrl = $movieImageUrl;
        $this->movieRating = $movieRating;
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

    public function getMovieReleaseDateByMovieId($movieId)
    {
        $req = $this->bdd->prepare('SELECT releaseDate FROM movie WHERE movieId = :movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetch();
    }

    public function getMovieReleaseDateYearByMovieId($movieId)
    {
        $req = $this->bdd->prepare('SELECT releaseDate FROM movie WHERE movieId = :movieId');
        $req->execute(array('movieId' => $movieId));
        $date = $req->fetch();
        if( strlen($date[0])>3){
            return substr($date[0], 0, 4);
        }
        return null;
    }

    public function addMovie()
    {
        $req = $this->bdd->prepare('INSERT IGNORE INTO movie (movieId, movieTitle, frenchTitle, runtime, releaseDate, movieImageUrl, movieRating) VALUES (:movieId, :title, :frenchTitle, :runtime, :releaseDate, :imageUrl, :rating)');
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

    public function searchMovie($title)
    {
        $req = $this->bdd->prepare('SELECT * FROM movie WHERE movieTitle LIKE :title');
        $req->execute(array('title' => '%'.$title.'%'));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function compareMovies($selected_film_id)
    {
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/ActingCredit.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/Actor.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/MovieProduction.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/ProductionCompany.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/MovieGenre.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/Genre.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/MovieDirector.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/Director.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/Movie.php');

        $stmt = $this->bdd->query('SELECT movieId FROM movie_of_the_day WHERE date = CURDATE()');
        $film_du_jour_id = $stmt->fetchColumn();

        // if($film_du_jour_id == $selected_film_id){
        //     return ["Success"];
        // }

        $stmt = $this->bdd->prepare('SELECT * FROM movie WHERE movieId = :selected_film_id');
        $stmt->execute(['selected_film_id' => $selected_film_id]);

        $film_to_check = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->bdd->prepare('SELECT * FROM movie WHERE movieId = :film_du_jour_id');
        $stmt->execute(['film_du_jour_id' => $film_du_jour_id]);

        $film_to_find = $stmt->fetch(PDO::FETCH_ASSOC);

        $actingCredits = new ActingCredit('', '', '', '');
        $actors_id_film_to_check = $actingCredits->getActorIdByMovieId($film_to_check['movieId']);

        $actors_id_film_to_find = $actingCredits->getActorIdByMovieId($film_to_find['movieId']);

        $common_actors = array_intersect($actors_id_film_to_check, $actors_id_film_to_find);
        
        $similarities = [];
        $similarities['Actors'] = [];
        foreach ($common_actors as $actor_id) {
            $actorIdDetails = new Actor('', '');  
            $similarities['Actors'][] =  $actorIdDetails->getActorById($actor_id);
        }

        $movieProduction = new MovieProduction('', '');

        $production_film_to_check = $movieProduction->getProductionCompanyByMovieId($film_to_check['movieId']);
        $production_film_to_find = $movieProduction->getProductionCompanyByMovieId($film_to_find['movieId']);

        $common_production = array_intersect($production_film_to_check, $production_film_to_find);

        $similarities['Production'] = [];
        foreach ($common_production as $production_id) {
            $productionDetails = new ProductionCompany('','','', '');
            $similarities['Production'][] = $productionDetails->getProductionCompanyById($production_id);
        }

        $movieGenre = new MovieGenre('', '');

        $genre_film_to_check = $movieGenre->getGenreByMovieId($film_to_check['movieId']);
        $genre_film_to_find = $movieGenre->getGenreByMovieId($film_to_find['movieId']);

        $common_genre = array_intersect($genre_film_to_check, $genre_film_to_find);

        $similarities['Genre'] = [];
        foreach ($common_genre as $genre_id) {
            $genreDetails = new Genre('', '');
            $similarities['Genre'][] = $genreDetails->getGenreById($genre_id);
        }

        $movieDirector = new MovieDirector('', '');

        $director_film_to_check = $movieDirector->getDirectorsByMovieId($film_to_check['movieId']);
        $director_film_to_find = $movieDirector->getDirectorsByMovieId($film_to_find['movieId']);

        $common_director = array_intersect($director_film_to_check, $director_film_to_find);

        $similarities['Director'] = [];
        foreach ($common_director as $director_id) {
            $directorDetails = new Director('', '');
            $similarities['Director'][] = $directorDetails->getDirectorById($director_id);
        }

        $movie = new Movie('', '', '', '', '', '', '');

        $release_date_film_to_check = $movie->getMovieReleaseDateYearByMovieId($film_to_check['movieId']);
        $release_date_film_to_find = $movie->getMovieReleaseDateYearByMovieId($film_to_find['movieId']);

        if ($release_date_film_to_check == $release_date_film_to_find) {
            $similarities['Release Date'] = $release_date_film_to_check;
        }

        return $similarities;
    }
}
