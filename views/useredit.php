<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Editer mon profil</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<!-- Vue d'édition de mon profil -->

<body>

    <?php require 'header.php' ?>

    <?php 
    $userData = new User("", "");
    $userData->getUserFromId($_SESSION['userId']); 
    ?>

    <div class="centeredMain">
        <div class="userFormContainer">
            <form action="/user/edit" method="POST" class="userForm">
                <!-- <div class="formContainer">
                    <label>Nom d'utilisateur : </label>
                    <input type="text" name="user" value="<?php echo $userData->getUserLogin() ?>"/>
                </div>
                <div class="formContainer">
                    <label>Mot de passe : </label>
                    <input type="password" name="pass" value="<?php //echo $userData->getUserPassword() ?>"/>
                </div> -->
                <div class="formContainer">
                    <label>Prénom : </label>
                    <input type="text" name="firstName" value="<?php echo $userData->getUserFirstName() ?>" required/>
                </div>
                <div class="formContainer">
                    <label>Nom : </label>
                    <input type="text" name="lastName" value="<?php echo $userData->getUserLastName() ?>" required/>
                </div>
                <div class="formContainer">
                    <label>Adresse mail : </label>
                    <input type="text" name="email" id="emailInput" value="<?php echo $userData->getUserEmail() ?>" required/>
                    <div id="errorMessage3" style="color: red;"></div>
                </div>
                <div>
                    <button class="btn" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>

    <?php require 'footer.php' ?>

    <script src="/views/js/email.js"></script>  

</body>