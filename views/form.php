<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8" />
 <title>Formulaire Connexion</title>
 <link rel="stylesheet" href="/views/styles.css">
</head>

<body>

<?php require "header.php"; ?>

<main>
    <div class="centeredMain">
        <div class="userFormContainer"> 
            <form action="/admin/user/add" method="POST" class="userForm">
                <div class="formContainer">
                    <label>Nom d'utilisateur : </label>
                    <input type="text" name="user" />
                </div>
                <div class="formContainer">   
                    <label>Mot de passe : </label>
                    <input type="password" name="pass" id="passwordInput"/>
                </div>
                <div class="formContainer">   
                    <label>Prénom : </label>
                    <input type="text" name="firstName" />
                </div>
                <div class="formContainer">   
                    <label>Nom : </label>
                    <input type="text" name="lastName" />
                </div>
                <div class="formContainer">   
                    <label>Adresse mail : </label>
                    <input type="text" name="email" />
                </div>
                <div class="formContainer">
                    <button class="button" type="submit" value="Soumettre">Soumettre</button>
                </div>
            </form>   
        </div>
    </div>
</main>

<?php require "footer.php" ?>

<script src="/views/password.js"></script>

</body>

</html>
