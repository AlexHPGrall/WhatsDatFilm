<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("controllers/adminController.php");
require_once("controllers/movieController.php");
require_once("controllers/loginController.php");
require_once("controllers/userController.php");
require_once("controllers/gameController.php");
require_once("controllers/verifyController.php");

$uri = $_SERVER['REQUEST_URI'];
//Gestionnaire de session 
if(!isset($_SESSION['userId']) && $uri != '/signin')
{
    if(explode('?', $uri)[0] == '/verify')
    {
        verifyController::index();
    }
    else
    {
        loginController::index();
    }
}
else if($uri == '/signin')
{
    header("Location: /login/signin");
    exit;
}
else if(isset($_SESSION['userId']) && $uri == '/')
{
    header("Location: /game/home");
    exit;
}
else
{
    //Parsing de l'url et redirection apropriée
    try
    {
        //on enleve les donnes du _get
        $uri = explode('?', $uri)[0];
        //le premier token de l'url determine le controller a utiliser
        //la concatenation des token suivants détermine la méthode du controller à appeler (on passe d'abord par l'index du controller)
        $controller = explode("/", strtolower($uri));
        $controller = $controller[1].'Controller';
        $controller::index();

    } catch (Error $e) {
        echo 'Error 404';
    }
}
