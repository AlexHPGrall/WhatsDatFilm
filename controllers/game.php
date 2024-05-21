<?php


    class game extends Bdd
    {
        private $dailyFilm;
        private $actors=[];
        private $found;

        public function __construct()
        {
            Bdd::__construct();
            $req = $this->bdd->prepare("SELECT * FROM Movies ORDER BY RAND() LIMIT 1");
            $req->execute();
            $this->dailyFilm = $req->fetch();
            $this->found = false;
            
        }

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
               include($_SERVER['DOCUMENT_ROOT'].'/views/game.php');
            }
            else
            {
               //echo $accessMethod;
               game::{$accessMethod}();
            }
       }
       
       public function guess($filmId)
       {
            if($this->dailyFilm['movieId'] == $filmId)
            {
                $this->found=true;
            }
            else
            {
                $movie = new Movie();
                $guessActors = $movie->getMovieActors($filmId);
                $daylyFilmActors = $movie->getMovieActors($this->dailyFilm['movieId'] );

                $common = array_intersect($daylyFilmActors, $guessActors);
                $this->actors = array_merge($this->actors, $common);

                $this->actors = array_unique($this->actors);
            }
       }
        
    }
?>