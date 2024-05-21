<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de films</title>
    <link rel="stylesheet" href="/views/styles/testapi.css">
    <link rel="stylesheet" href="/views/addmovie.css">
</head>
<body>

<?php require 'header.php' ?>

<div class="centeredMain">
  <div class="searchContainer">
    <input id="searchInput" type="text" placeholder="Search ..." class="searchBar">
    <i class="bi bi-search"></i>
  </div>
  <div class="filmList"></div>
</div>

<?php require 'footer.php' ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/views/js/search.js"></script>

</body>
</html>

