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
            <div class="userForm">
                <form action="/loginController/log" method="POST" class="form">
                    <div class="formContainer">
                        <label>Nom d'utilisateur : </label>
                        <input type="text" name="userName" required="">
                    </div>
                    <div class="formContainer">
                        <label>Mot de passe : </label>
                        <input type="password" name="userPassword" required="">
                    </div>

                    <button type="submit" class="btn">Connexion</button>
                </form>
            
                <form action="/loginController/singe" method="POST" class="paddingTopBottom">
                    <button type="submit" class="btn">
                        S'inscrire
                    </button>
                </form>
                <form action="/error404.php" method="POST" class="paddingTopBottom">
                    <button type="submit" class="btn">
                        J'ai oublié mon mot de passe ? (pas encore disponible)
                    </button>
                </form>
            </div>
        </div>
    </main>

    <?php require "footer.php" ?>

</body>