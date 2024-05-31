<!DOCTYPE html>
<html lang="fr">

<!-- Boutons du header quand on est sur la page du jeu -->

<?php 
    include_once('models/Admin.php');
    include_once('models/Actor.php');
    $userId = $_SESSION['userId'];
    $admin = new Admin("", $userId);
    
    var_dump($userId);
    var_dump(class_exists("Admin")); // Doit retourner true si la classe est disponible
    var_dump(method_exists($admin, "getAdminByUserId")); // Doit retourner true
    var_dump(get_class($admin));
    var_dump(class_exists("Actor")); // Doit retourner true si la classe est disponible
    var_dump(method_exists("Actor", "getId")); // Doit retourner true
    die();

    $isAdmin = $admin->getAdminByUserId($userId);

    if ($isAdmin) {
        echo '
        <form action="/admin/home" method="post">
            <button class="btn" type="submit" id="home">Backoffice</button>
        </form>';
    }
?>

<form action="/admin/home" method="post">
    <button class="btn" type="submit" id="home">Backoffice</button>
</form>
<form action="/userController/home" method="post">
    <button class="btn" type="submit" id="user">Mon profil</button>
</form>