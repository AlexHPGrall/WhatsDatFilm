<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="/views/login.css">
</head>

<body>

    <div class="login-box">
        <form action="/loginh.php" method="POST">
            <div class="user-box">  
                <input type="text" name="userName" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
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
        </form>
    </div>

</body>