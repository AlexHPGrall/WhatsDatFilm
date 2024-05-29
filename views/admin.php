<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Vue Admin</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<body>

    <?php require 'header.php' ?>

    <main class="centeredMain">
        
        <div class="tableSearch">
            <input id="string" type="text" placeholder="bar de recherche" class="tableSearchElmt">
            <button class="btn tableSearchElmt" type="button" id="search">Rechercher</button>
            <button class="btn tableSearchElmt" type="button" id="reset">Réinitialiser</button>
        </div>

        <?php require $adminView ?>

    </main>

    <?php require 'footer.php' ?>


    <script src="/jquery.js"></script>
    <script src="/views/js/table.js"></script>
    <script src="/views/js/confirmationButton.js"></script>

</body>