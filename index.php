<?php
session_start();

    include("models/user.php");
    include("controllers/admin.php");
    $uri = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['userId']) && $uri != '/register')
{
    header("Location: login.php");
    exit;
}
else if($uri == '/register')
{
    header("Location: register.php");
    exit;
}

try
{
    $list= explode("/", strtolower($uri));
    $list[1]::index();
}
catch(Exception $e)
{ 
    echo 'Error 404';
}


?>