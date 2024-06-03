<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de films</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>
<body>

<!-- Vue de la page d'ajout de film depuis tmdb à notre base de donnée -->

<?php require 'header.php' ?>

<div class="centeredMain">

  <form class="returnBtn" action="admin/movie" method="post" name="return">
    <button class="btn" type="submit" id="return">Retour</button>
  </form>

  <div class="searchContainer">
    <input id="searchInput" type="text" placeholder="Rechercher ..." class="searchBar">
    <i class="bi bi-search"></i>
  </div>
  <div class="filmList"></div>
</div>

<?php require 'footer.php' ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/views/js/search.js"></script>

</body>
</html>

