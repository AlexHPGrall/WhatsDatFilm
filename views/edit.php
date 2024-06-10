<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Formulaire Connexion</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<!-- Modification d'un utilisateur quand on est admin -->


<body>
    <?php require 'header.php'?>

    <form class="returnBtn" action="admin/user" method="post" name="return">
        <button class="btn" type="submit" id="return">Retour</button>
    </form>
    
    <div class="centeredMain">
        <div class="userFormContainer">
            <form action="/admin/user/update" method="POST" class="userForm">
                <div class="formContainer">
                    <label>Nom d'utlisateur : </label>
                    <input type="text" name="user" value="<?php echo $user->getUserLogin() ?>" />
                </div>
                <div class="formContainer">
                    <label>Mot de passe : </label>
                    <input name="pass" value="..." />
                </div>
                <div class="formContainer">
                    <label>Prénom : </label>
                    <input type="text" name="firstName" value="<?php echo $user->getUserFirstName() ?>" />
                </div>
                <div class="formContainer">
                    <label>Nom : </label>
                    <input type="text" name="lastName" value="<?php echo $user->getUserLastName() ?>" />
                </div>
                <div class="formContainer">
                    <label>Adresse mail: </label>
                    <input type="text" name="email" value="<?php echo $user->getUserEmail() ?>" />
                </div>
                <div>
                    <input type="hidden" name="userId" value="<?php echo $user->getUserId() ?>" />
                </div>
                <div>
                    <button class="btn" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>

    <?php require 'header.php'?>
</body>

</html>