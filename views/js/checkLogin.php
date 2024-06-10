<?php

include_once '../../models/bdd.php';  
include_once '../../models/user.php';

// Vérifie si un nom d'utilisateur spécifique existe
if (isset($_POST['login'])) {
    $login = $_POST['login'];

    $user = new User("", "");
    $user->loginExist($login);

    exit;
}
echo json_encode(['exists' => false]);

?>