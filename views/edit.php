<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Formulaire Connexion</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<body>
    <form action="/Admin/User/Update" method="POST">
        <div>
            <label>Username: </label>
        </div>
        <div>
            <input type="text" name="user" value="<?php echo $user->getUserLogin() ?>" />
        </div>
        <div>
            <label>Password: </label>
        </div>
        <div>
            <input type="password" name="pass" value="<?php echo $user->getUserPassword() ?>" />
        </div>
        </div>
        <div>
            <label>FirstName: </label>
        </div>
        <div>
            <input type="text" name="firstName" value="<?php echo $user->getUserFirstName() ?>" />
        </div>
        <div>
            <label>LastName: </label>
        </div>
        <div>
            <input type="text" name="lastName" value="<?php echo $user->getUserLastName() ?>" />
        </div>
        <div>
            <label>E-mail: </label>
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