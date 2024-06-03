<?php
    class movieController
    {
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
            if(count($list)<4)
            {
               include($_SERVER['DOCUMENT_ROOT'].'/views/testapiview.php');
          }
          else
          {
               //echo $accessMethod;
               movieController::{$accessMethod}();
          }
       }

       public static function add ($movieData) {
         

         include_once($_SERVER['DOCUMENT_ROOT'].'/models/Movie.php');
         $movie = new Movie(
            $movieData['id'], 
            $movieData['title'], 
            $movieData['frenchTitle'], 
            $movieData['runtime'], 
            $movieData['releaseDate'], 
            $movieData['movieImageUrl'], 
            $movieData['movieRating']
         );

         $movie->addMovie();
       }

       public static function movieDetails ($movieDetails) {

         
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/Genre.php');
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/Director.php');
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/Actor.php');
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/ActingCredit.php');
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/MovieGenre.php');
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/MovieDirector.php');
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/MovieProduction.php');
         include_once($_SERVER['DOCUMENT_ROOT'].'/models/ProductionCompany.php');

         $movieId = $movieDetails['details']['id'];

         foreach ($movieDetails['credits']['cast'] as $cast) {
            usleep( 100000 );
            if ($cast['known_for_department'] == 'Acting') {

              

               $actor = new Actor($cast['id'], $cast['name']);
               $actor->addActor();

               $actingCredit = new ActingCredit($cast["credit_id"], $movieId, $cast['id'], $cast['character']);
               $actingCredit->addActingCredit();
            }
            elseif ($cast['known_for_department'] == 'Directing') {


               $director = new Director($cast['id'], $cast['name']);
               $director->addDirector();

               $movieDirector = new MovieDirector($movieId, $cast['id']);
               $movieDirector->addMovieDirector();
            }
         }

         foreach ($movieDetails['credits']['crew'] as $cast) {
            usleep( 100000 );
            if ($cast['known_for_department'] == 'Directing') {

               $director = new Director($cast['id'], $cast['name']);
               $director->addDirector();

               $movieDirector = new MovieDirector($movieId, $cast['id']);
               $movieDirector->addMovieDirector();
            }
         }

         foreach ($movieDetails['details']['genres'] as $genre) {
            usleep( 100000 );
            $newGenre = new Genre($genre['id'], $genre['name']);
            $newGenre->addGenre();

            $movieGenre = new MovieGenre($movieId, $genre['id']);
            $movieGenre->addMovieGenre();
         }

         foreach ($movieDetails['details']['production_companies'] as $productionCompany) {
            usleep( 100000 );
            $newProductionCompany = new ProductionCompany($productionCompany['id'], $productionCompany['name'], $productionCompany['origin_country'], $productionCompany['logo_path']);
            $newProductionCompany->addProductionCompany();

            $movieProduction = new MovieProduction($movieId, $productionCompany['id']);
            $movieProduction->addMovieProduction();
         }
      }

    }
?>