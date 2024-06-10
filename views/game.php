<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Vue Admin</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<!-- Vue du jeu de l'application -->

<body>

    <?php require 'header.php' ?>

    <main class="centeredMain">
        <input type="text" id="searchInput" placeholder="Rechercher un film" class="searchFilmInput">
        <div class="filmList"></div>
        <div class="history-container">
            <div id="history"></div>
        </div>
    </main>

    <?php require 'footer.php' ?>


    <script src="/jquery.js"></script>
    <script src="/views/js/localSearch.js"></script>
    <script src="/views/js/confirmationButton.js"></script>

</body>

