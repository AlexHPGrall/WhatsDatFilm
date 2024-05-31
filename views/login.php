<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<!-- Vue de la page de connexion -->

<body>

    <?php require "header.php" ?>

    <main class="centeredMain">
        <div class="userFormContainer">
            <form action="/loginController/log" method="POST" class="userForm">
                <div class="formContainer">
                    <input type="text" name="userName" required="">
                    <label>Nom d'utilisateur</label>
                </div>
                <div class="formContainer">
                    <input type="password" name="userPassword" required="">
                    <label>Mot de passe</label>
                </div>
                <button type="submit" class="button">Connexion</button>

                <a href="/loginController/signin" class="signin">
                    S'inscrire
                </a>
            </form>
        </div>
    </main>

    <?php require "footer.php" ?>

</body>