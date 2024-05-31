<!DOCTYPE html>
<html lang="fr">

<!-- Boutons du header quand on est sur la page du jeu -->

<?php 
    require_once "models/Admin.php";
    
    $admin = new Admin("", "");
    $userId = $_SESSION['userId'];
    var_dump($userId);
    

    $isAdmin = $admin->getAdminByUserId($userId);

    var_dump($isAdmin);
    die();

    if ($isAdmin) {
        echo '
        <form action="/admin/home" method="post">
            <button class="btn" type="submit" id="home">Backoffice</button>
        </form>';
    }
?>


<form action="/userController/home" method="post">
    <button class="btn" type="submit" id="user">Mon profil</button>
</form>