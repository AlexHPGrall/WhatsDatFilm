<?php

require_once 'bdd.php';
class MovieProduction extends Bdd
{

    private $movieId;
    private $productionCompanyId;

    public function __construct($movieId, $productionCompanyId)
    {
        Bdd::__construct();
        $this->movieId = $movieId;
        $this->productionCompanyId = $productionCompanyId;
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

    public function getProductionCompanyId()
    {
        return $this->productionCompanyId;
    }

    public function setProductionCompanyId($productionCompanyId)
    {
        $this->productionCompanyId = $productionCompanyId;
    }

    // Database methods
    public function addMovieProduction()
    {
        $req = $this->bdd->prepare('INSERT IGNORE INTO movie_production (movieId, productionCompanyId) VALUES (:movieId, :productionCompanyId)');
        $req->execute(array('movieId' => $this->movieId, 'productionCompanyId' => $this->productionCompanyId));
    }

    public function getProductionCompanyByMovieId($movieId)
    {
        $req = $this->bdd->prepare('SELECT productionCompanyId FROM movie_production WHERE movieId =:movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getMoviesByProductionCompany($productionCompanyId)
    {
        $req = $this->bdd->prepare('SELECT movieId FROM movie_production WHERE productionCompanyId =:productionCompanyId');
        $req->execute(array('productionCompanyId' => $productionCompanyId));
        return $req->fetchAll();
    }
}
