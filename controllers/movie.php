<?php
    class movie
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
            //    $user = new Movie("", "");
            //    $table = $user->getAllMovies();
               include($_SERVER['DOCUMENT_ROOT'].'/views/testapiview.php');
          }
          else
          {
               //echo $accessMethod;
               movie::{$accessMethod}();
          }

       } 
       public static function moviesearch()
       {
         $movie = new Movie();

         return $movie->getMatchingMovies($_POST['movieTitle']);
       }
        
    }
?>