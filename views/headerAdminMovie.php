<!DOCTYPE html>
<html lang="fr">

<!-- Boutons du header quand on est sur la partie d'administration des films -->

<form action="/game/home" method="post">
    <button class="logBtn" type="submit" id="game" title="Jeu"><img src="/views/style/jeu.png" alt="Jeu" class="logBtnContent"></button>
</form>
<form action="/admin/home" method="post">
    <button class="logBtn" type="submit" id="home" title="Home"><img src="/views/style/home.png" alt="Home" class="logBtnContent"></button>
</form>
<form action="/admin/user" method="post">
    <button class="logBtn" type="submit" id="user" title="Utilisateurs"><img src="/views/style/users.png" alt="Utilisateurs" class="logBtnContent"></button>
</form>