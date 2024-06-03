<!DOCTYPE html>
<html lang="fr">

<!-- Boutons du header quand on est sur la page d'édition de notre profil -->

<?php 
    require_once('models/Admin.php');
    include_once('models/Actor.php');
    $userId = $_SESSION['userId'];
    $admin = new Admin("", $userId);

    $isAdmin = $admin->getAdminByUserId($userId);

    if ($isAdmin) {
        echo '
        <form action="/admin/home" method="post">
            <button class="btn" type="submit" id="home">Backoffice</button>
        </form>';
    }
?>

<form action="/game/home" method="post">
    <button class="btn" type="submit" id="game">Jeu</button>
</form>