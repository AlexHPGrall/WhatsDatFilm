<?php

class login {

    public static function index()
    {  
        $uri = $_SERVER['REQUEST_URI'];  
        $uri = rtrim($uri,"/");
            
        $list= explode("/", strtolower($uri));  
        $accessMethod = "";
        //concatenation des token pour appeler la bonne methode
        for($i=1; $i<count($list); $i++)
        {
            $accessMethod = $accessMethod.$list[$i];
        }
            login::{$accessMethod}();

    } 

    public static function login() 
    {
        include($_SERVER['DOCUMENT_ROOT'].'/views/login.php');
    }

    public static function logout()
    {
        
    }

}