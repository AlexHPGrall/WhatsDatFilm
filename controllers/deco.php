<?php 
    session_start();
    $idSession=$_COOKIE['PHPSESSID'];
    if(isset($_SESSION[$idSession]))
    {
        unset($_SESSION[$idSession]);
    }
    session_destroy();
    include("../views/form.php");
    ?>