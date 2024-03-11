<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8" />
 <title>What's Dat Film</title>
 <link rel="stylesheet" href="/style.css">
</head>

<?php
    include("models/user.php");
    include("controllers/admin.php");
    $uri = $_SERVER['REQUEST_URI'];
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