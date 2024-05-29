<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("controllers/admin.php");
include("controllers/movieController.php");
include("controllers/loginController.php");
include("controllers/userController.php");
include("controllers/gameController.php");

$uri = $_SERVER['REQUEST_URI'];
//Gestionnaire de session 
if(!isset($_SESSION['userId']) && $uri != '/signin')
{
    loginController::index();
}
else if($uri == '/signin')
{
    header("Location: /loginController/signin");
    exit;
}
else
{
    //Parsing de l'url et redirection apropriée
    try
    {
        //le premier token de l'url determine le controller a utiliser
        //la concatenation des token suivants détermine la méthode du controller à appeler (on passe d'abord par l'index du controller)
        $controller = explode("/", strtolower($uri));
        $controller[1]::index();

    } catch (Error $e) {
        echo 'Error 404';
    }
}
