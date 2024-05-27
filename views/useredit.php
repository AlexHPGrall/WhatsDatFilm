<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Vue Admin</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<body>

    <?php require 'header.php' ?>
    <form action="/login/logout" method="post">
        <button type="submit">Déconnexion</button>
    </form>

    <?php $userData = $user->getUserFromId($_SESSION['userId']) ?>

    <div class="centeredMain">
        <div class="userFormContainer">
            <form action="/login/signin" method="POST" class="userForm">
                <div class="formContainer">
                    <label>Nom d'utilisateur : </label>
                    <input type="text" name="user" value="<?php echo($userData['userLogin']) ?>"/>
                </div>
                <div class="formContainer">
                    <label>Mot de passe : </label>
                    <input type="password" name="pass" value="<?php echo($userData['userPassword']) ?>"/>
                </div>
                <div class="formContainer">
                    <label>Prénom : </label>
                    <input type="text" name="firstName" value="<?php echo($userData['userFirstName']) ?>"/>
                </div>
                <div class="formContainer">
                    <label>Nom : </label>
                    <input type="text" name="lastName" value="<?php echo($userData['userLastName']) ?>"/>
                </div>
                <div class="formContainer">
                    <label>Adresse mail : </label>
                    <input type="text" name="email" value="<?php echo($userData['userEmail']) ?>"/>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </div>
    </div>

    <?php require 'footer.php' ?>

</body>