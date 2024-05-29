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
            try {gameController::$accessMethod();}
            catch(Error $e) {include($_SERVER['DOCUMENT_ROOT'].'/views/404.php');}
        }

    } 

    public static function home() {
        $headerView = "headerGame.php";
        include($_SERVER['DOCUMENT_ROOT'].'/views/game.php');
    }

}