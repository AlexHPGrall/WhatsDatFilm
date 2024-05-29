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
            var_dump("if");
            userController::home();
        } else {
            var_dump("else");
            var_dump($accessMethod);
            try {userController::$accessMethod();}
            catch(Error $e) {include($_SERVER['DOCUMENT_ROOT'].'/views/404.php');}
        }

    } 

    public static function home() {
        include($_SERVER['DOCUMENT_ROOT'].'/views/game.php');
    }

}