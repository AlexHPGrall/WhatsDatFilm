<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Formulaire Connexion</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<!-- Vue du formulaire de création d'un compte -->

<body>

    <?php require "header.php" ?>

    <div class="centeredMain">
        <div class="userFormContainer">
            <form action="/loginController/signin" method="POST" class="userForm" id="signin">
                <div class="formContainer">
                    <label>*Nom d'utilisateur : </label>
                    <input type="text" name="user" required/>
                </div>
                <div class="formContainer">
                    <label>*Mot de passe : </label>
                    <input type="password" name="pass" id="passwordInput" required/>
                    <div id="errorMessage1" style="color: red;"></div>
                </div>
                <div class="formContainer">
                    <label>*Mot de passe : </label>
                    <input type="password" name="passBis" id="passwordInputBis" required/>
                    <div id="errorMessage2" style="color: red;"></div>
                </div>
                <div class="formContainer">
                    <label>Prénom : </label>
                    <input type="text" name="firstName"/>
                </div>
                <div class="formContainer">
                    <label>Nom : </label>
                    <input type="text" name="lastName"/>
                </div>
                <div class="formContainer">
                    <label>*Adresse mail : </label>
                    <input type="text" name="email" required/>
                </div>
                <div>
                    <button class="btn" type="submit">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php require "footer.php" ?>

    <script src="/jquery.js"></script>
    <script src="/views/js/password.js"></script>

</body>

</html>