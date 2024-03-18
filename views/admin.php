<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Vue Admin</title>
    <link rel="stylesheet" href="/views/styles.css">
</head>

<body>

    <?php require 'header.php' ?>
    <form action="/logout" method="post">
        <button type="submit">Déconnexion</button> 
    </form>

    <main class="centeredMain">

        <?php require 'user.php'?>

        <form action="/admin/user/form" method="post">
            <button class="button" type="submit">Ajout utilisateur</button> 
        </form>

        <input id="string" type="text">
        <button class="button" type="button" id="search">Rechercher</button>
        <button class="button" type="button" id="reset">Réinitialiser</button>

    </main>

    <?php require 'footer.php' ?>

    <script src="/jquery.js"></script>
    <script src="/views/table.js"></script>

</body>