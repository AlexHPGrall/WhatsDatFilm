<?php
    include("models/user.php");
    include("controllers/admin.php");
    $uri = $_SERVER['REQUEST_URI'];
try
{
    $list= explode("/", strtolower($uri));
    if(count($list)<3)
    {
        $list[1]::index();
    }
    else
    {
        $list[1]::{$list[2]}();
    }
}
catch(Exception $e)
{ 
    echo 'Error 404';
}

?>
