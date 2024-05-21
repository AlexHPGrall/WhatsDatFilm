<?php
session_start();

   
include("controllers/admin.php");
    $uri = $_SERVER['REQUEST_URI'];
//Gestionnaire de session (si pas de session redirection vers la page de login/signup)
if(!isset($_SESSION['userId']) && $uri != '/signup')
{
    header("Location: /login");
    exit;
}
else if($uri == '/signup')
{
    header("Location: /signup");
    exit;
}

//Parsing de l'url et redirection apropriée
try
{
    //le premier token de l'url determine le controller a utiliser
    //la concatenation des token suivants détermine la méthode du controller à appeler (on passe d'abord par l'index du controller)
    $list= explode("/", strtolower($uri));
    /*if($list[1] == "")
        $list[1] = "Admin";
        */
    $list[1]::index();
} catch (Exception $e) {
    echo 'Error 404';
}
