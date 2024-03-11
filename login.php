<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['userName'];
    $password = $_POST['userPassword'];
    
    $_SESSION['userId'] = 1;
    header("Location: /Admin/user");
    exit;
}
else
{ 
    include('views/login.php');
} 
?>