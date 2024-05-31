<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Formulaire Connexion</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<!-- Modification d'un utilisateur quand on est admin -->

<body>
    <form action="/admin/user/update" method="POST">
        <div>
            <label>Nom d'utlisateur : </label>
        </div>
        <div>
            <input type="text" name="user" value="<?php echo $user->getUserLogin() ?>" />
        </div>
        <div>
            <label>Mot de passe : </label>
        </div>
        <div>
            <input type="password" name="pass" value="<?php echo $user->getUserPassword() ?>" />
        </div>
        </div>
        <div>
            <label>Prénom : </label>
        </div>
        <div>
            <input type="text" name="firstName" value="<?php echo $user->getUserFirstName() ?>" />
        </div>
        <div>
            <label>Nom : </label>
        </div>
        <div>
            <input type="text" name="lastName" value="<?php echo $user->getUserLastName() ?>" />
        </div>
        <div>
            <label>Adresse mail: </label>
        </div>
        <div>
            <input type="text" name="email" value="<?php echo $user->getUserEmail() ?>" />
        </div>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</body>

</html>