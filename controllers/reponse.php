<?php 
include("../models/user.php");
$user=new User($_POST['user'] , $_POST['pass']);
$user->setUserFirstName($_POST['firstName']);
$user->setUserLastName($_POST['lastName']);
$user->setUserEmail($_POST['email']);
$user->addUser();
?>