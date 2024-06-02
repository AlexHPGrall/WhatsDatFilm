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

    public static function checkMovie($movieDetails) {

        include_once($_SERVER['DOCUMENT_ROOT'].'/models/MovieOfTheDay.php');

        $movieOfTheDay = new MovieOfTheDay('', 0);
        $movieOfTheDay->getMovieOfTheDay();

        if (isset($_POST['selected_film_id'])) {
            $selected_film_id = $_POST['selected_film_id'];
    
            // Récupérer le film du jour
            $stmt = $pdo->query('SELECT film_id FROM film_du_jour WHERE id = 1');
            $film_du_jour_id = $stmt->fetchColumn();
    
            // Récupérer les détails des deux films
            $stmt = $pdo->prepare('SELECT * FROM films WHERE id IN (:selected_film_id, :film_du_jour_id)');
            $stmt->execute(['selected_film_id' => $selected_film_id, 'film_du_jour_id' => $film_du_jour_id]);
    
            $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Comparer les informations
            $similarities = [];
            if ($films[0]['actors'] == $films[1]['actors']) {
                $similarities[] = 'Acteurs';
            }
            if ($films[0]['studio'] == $films[1]['studio']) {
                $similarities[] = 'Studio';
            }
            if ($films[0]['genre'] == $films[1]['genre']) {
                $similarities[] = 'Genre';
            }
            if ($films[0]['director'] == $films[1]['director']) {
                $similarities[] = 'Réalisateur';
            }
            if ($films[0]['year'] == $films[1]['year']) {
                $similarities[] = 'Année';
            }
        }
    }

}