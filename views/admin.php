<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Vue Admin</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<!-- Vue de la partie administration de l'apllication, $adminView appelle les 
pages "home", "user" ou "movie" de l'application en fonction du besoin -->

<body>

    <?php require 'header.php' ?>

    <main class="centeredMain">

        <?php require $adminView ?>

    </main>

    <?php require 'footer.php' ?>


    <script src="/jquery.js"></script>
    <script src="/views/js/table.js"></script>
    <script src="/views/js/confirmationButton.js"></script>

</body>