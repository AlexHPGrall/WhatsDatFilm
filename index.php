<?php
    include("models/user.php");
    include("controllers/admin.php");
    include("controllers/movie.php");
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
