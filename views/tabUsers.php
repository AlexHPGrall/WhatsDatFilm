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
        <p>test</p>
        <table>
            <tr>
                <th>Id</th>
                <th>Nom utilisateur</th>
                <th>Mot de passe</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>email</th>
            </tr>
            <?php 
                foreach($table as $userData)
                {
                    echo('<tr>');
                    echo('<td>');
                    echo $userData['userId'];
                    echo('</td>');
                    echo('<td>');
                    echo $userData['userLogin'];
                    echo('</td>');
                    echo('<td>');
                    echo $userData['userPassword'];
                    echo('</td>');
                    echo('<td>');
                    echo $userData['userFirstName'];
                    echo('</td>');
                    echo('<td>');
                    echo $userData['userLastName'];
                    echo('</td>');
                    echo('<td>');
                    echo $userData['userEmail'];
                    echo('</td>');
                    echo('</tr>');
                }
            ?>
        </table>
    </main>

    <?php require "footer.php" ?>

</body>