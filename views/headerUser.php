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
            <button class="logBtn" type="submit" id="backoffice" title="Backoffice"><img src="/views/style/settings.png" alt="Backoffice" class="logBtnContent"></button>
        </form>';
    }
?>

<form action="/game/home" method="post">
    <button class="logBtn" type="submit" id="game" title="Jeu"><img src="/views/style/jeu.png" alt="Jeu" class="logBtnContent"></button>
</form>