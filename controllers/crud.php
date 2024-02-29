<?php 
include("../models/user.php");
$user=new User("", "");
$table=$user->getAllUsers();

include("../views/admin.php");

?>