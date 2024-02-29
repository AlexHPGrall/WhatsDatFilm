<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require "header.php"; ?>
    <main>
        <div class="centeredMain">
            <div class="userFormContainer"> 
                <form action="../controllers/reponse.php" method="POST" class="userForm">
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
                    <div>
                        <input type="submit" />
                    </div>
                </form>   
            </div>
        </div>
    </main>
</body>