<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Vue Admin</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<body>

    <?php require 'header.php' ?>
    <form action="/logout" method="post">
        <button type="submit">Déconnexion</button>
    </form>

    <main class="centeredMain">

        <?php require $adminView ?>

        <form action="/admin/user/form" method="post" name="add">
            <button type="submit">Ajouter</button>
        </form>

        <input id="string" type="text">
        <button type="button" id="search">Rechercher</button>
        <button type="button" id="reset">Réinitialiser</button>
    </main>

    <?php require 'footer.php' ?>


    <script src="/jquery.js"></script>
    <script src="/views/js/table.js"></script>
    <script src="/views/js/confirmationButton.js"></script>

</body>