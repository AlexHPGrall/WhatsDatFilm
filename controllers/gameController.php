<?php

class gameController {

    public static function index()
    {  

        $uri = $_SERVER['REQUEST_URI'];  
        $uri = rtrim($uri,"/");
            
        $list= explode("/", strtolower($uri));  
        $accessMethod = "";

        for($i=2; $i<count($list); $i++)
        {
            $accessMethod = $accessMethod.$list[$i];
        }

        if ($accessMethod == "") {
            gameController::home();
        } else {
            /*try {*/gameController::$accessMethod();//}
            //catch(Error $e) {include($_SERVER['DOCUMENT_ROOT'].'/views/404.php');}
        }

    } 

    public static function home() {
        $headerView = "headerGame.php";
        include($_SERVER['DOCUMENT_ROOT'].'/views/game.php');
    }

    public static function searchLocal($query) {
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/Movie.php');
        $movie = new Movie('', '', '', '', '', '', '');
        $movies = $movie->searchMovie($query);
        echo json_encode($movies);
     }

     public static function compareMovies($selected_film_id) {
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/Movie.php');
        $movie = new Movie('', '', '', '', '', '', '');
        $result = $movie->compareMovies($selected_film_id);
        echo json_encode($result);
     }
     public static function getMovieData($selected_film_id) {
        include_once($_SERVER['DOCUMENT_ROOT'].'/models/Movie.php');
        $movie = new Movie('', '', '', '', '', '', '');
        $result = $movie->getMovieData($selected_film_id);
        echo json_encode($result);
     }
}