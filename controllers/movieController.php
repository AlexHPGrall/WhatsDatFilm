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
         include($_SERVER['DOCUMENT_ROOT'].'/models/Movie.php');
         $movie = new Movie();
         
         $movie->setMovieId($movieData['id']);
         $movie->setTitle($movieData['title']);
         $movie->setFrenchTitle($movieData['frenchTitle']);
         $movie->setRuntime($movieData['runtime']);
         $movie->setReleaseDate($movieData['releaseDate']);
         $movie->setImageUrl($movieData['movieImageUrl']);
         $movie->setRating($movieData['movieRating']);

         if ($movie->addMovie()) {
            echo '<script>alert("Film ajouté !")</script>'; 
         }
         else {
             echo "Error";
             exit;
         }
       }
         
    }
?>