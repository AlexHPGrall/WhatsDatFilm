<!DOCTYPE html>
<html lang="fr">

<!-- Boutons du header quand on est sur la partie d'administration des films -->

<form action="/gameController/home" method="post">
    <button class="btn" type="submit" id="game">Jeu</button>
</form>
<form action="/adminController/home" method="post">
    <button class="btn" type="submit" id="home">Home</button>
</form>
<form action="/adminController/user" method="post">
    <button class="btn" type="submit" id="user">Utilisateurs</button>
</form>