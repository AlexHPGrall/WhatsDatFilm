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
            <form action="/login.php" method="POST" class="userForm">
                <div class="formContainer">
                    <input type="text" name="userName" required="">
                    <label>Username</label>
                </div>
                <div class="formContainer">
                    <input type="password" name="userPassword" required="">
                    <label>Password</label>
                </div>
                <a href="/login">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <button type="submit" class="button">Connexion</button>
                </a>
                <a href="/signup" class="signup">
                    Sign Up
                </a>
            </form>
        </div>
    </main>

    <?php require "footer.php" ?>

</body>