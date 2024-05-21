<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Formulaire Connexion</title>
    <link rel="stylesheet" href="/views/style/styles.css">
</head>

<body>
    <form action="/signup.php" method="POST">
        <div>
            <label>Nom d'utilisateur : </label>
        </div>
        <div>
            <input type="text" name="user" />
        </div>
        <div>
            <label>Mot de passe : </label>
        </div>
        <div>
            <input type="password" name="pass" />
        </div>
        </div>
        <div>
            <label>Prénom : </label>
        </div>
        <div>
            <input type="text" name="firstName" />
        </div>
        <div>
            <label>Nom : </label>
        </div>
        <div>
            <input type="text" name="lastName" />
        </div>
        <div>
            <label>Adresse mail : </label>
        </div>
        <div>
            <input type="text" name="email" />
        </div>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</body>

</html>