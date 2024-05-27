<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<body>

    <?php require "header.php" ?>

    <main class="centeredMain">
        <div class="userFormContainer">
            <form action="/login/log" method="POST" class="userForm">
                <div class="formContainer">
                    <input type="text" name="userName" required="">
                    <label>Nom d'utilisateur</label>
                </div>
                <div class="formContainer">
                    <input type="password" name="userPassword" required="">
                    <label>Mot de passe</label>
                </div>
                <button type="submit" class="button">Connexion</button>

                <a href="/signup" class="signup">
                    S'inscrire
                </a>
            </form>
        </div>
    </main>

    <?php require "footer.php" ?>

</body>