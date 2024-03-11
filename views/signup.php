<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8" />
 <title>Formulaire Connexion</title>
 <link rel="stylesheet" href="/views/login.css">
</head>

<body>
<form action="/signup.php" method="POST">
    <div>
    <label>Username: </label>
    </div>
    <div>
    <input type="text" name="user" />
</div>
<div>   
    <label>Password: </label>
    </div>
    <div>
    <input type="password" name="pass" />
</div>
</div>
<div>   
    <label>FirstName: </label>
    </div>
    <div>
    <input type="text" name="firstName" />
</div>
<div>   
    <label>LastName: </label>
    </div>
    <div>
    <input type="text" name="lastName" />
</div>
<div>   
    <label>E-mail: </label>
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
