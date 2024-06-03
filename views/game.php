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
        <input type="text" id="searchInput" placeholder="Rechercher un film">
        <div class="filmList"></div>
        <div class="similarities-container">
            <h3>Similarités avec le film du jour :</h3>
            <div id="similarities"></div>
        </div>
    </main>

    <?php require 'footer.php' ?>


    <script src="/jquery.js"></script>
    <script src="/views/js/localSearch.js"></script>
    <script src="/views/js/confirmationButton.js"></script>

</body>