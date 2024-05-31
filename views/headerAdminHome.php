<!DOCTYPE html>
<html lang="fr">

<!-- Boutons du header quand on est sur la partie d'administration de la plateforme -->

<form action="/gameController/home" method="post">
    <button class="btn" type="submit" id="game">Jeu</button>
</form>
<form action="/admin/user" method="post">
    <button class="btn" type="submit" id="user">Utilisateurs</button>
</form>
<form action="/admin/movie" method="post">
    <button class="btn" type="submit" id="movie">Films</button>
</form>