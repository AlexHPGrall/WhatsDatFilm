<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['userName'];
    $password = $_POST['userPassword'];
    include("models/bdd.php");
    include("models/user.php");

    $user = new User($username, $password);

    $cred = $user->getLoginCredentials($username);

    if ($cred && $cred['userPassword'] == $password) {
        $user->readUser();
        $_SESSION['userId'] = $user->getUserId();
        header("Location: /Admin/user");
        exit;
    }
    header("Location: login.php");
    exit;
} else {
    include('views/login.php');
}
