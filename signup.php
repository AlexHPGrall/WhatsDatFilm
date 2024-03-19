<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("models/bdd.php");
    include("models/user.php");
    $user = new User($_POST['user'], $_POST['pass']);

    $user->setUserFirstName($_POST['firstName']);
    $user->setUserLastName($_POST['lastName']);
    $user->setUserEmail($_POST['email']);
    if ($user->addUser()) {
        $user->readUser();

        $_SESSION['userId'] = $user->getUserId();
        header("Location: /Admin/user");
        exit;
    }

    header("Location: login.php");
    exit;
} else {
    include('views/signup.php');
}
?>
