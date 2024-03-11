<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Vue Admin</title>
    <link rel="stylesheet" href="/views/styles.css">
</head>

<body>

    <?php require 'header.php' ?>

    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>login</th>
                    <th>password</th>
                    <th>first name</th>
                    <th>last name</th> 
                    <th>e-mail</th>
                </tr>
            </thead>
            <tbody>
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
                        echo('<td>');
                        echo '<form action="/Admin/Delete" method="post">
                            <button class="button" type="submit" name="userId" value="';
                        echo $userData["userId"];
                        echo '">Supprimer</button> </form>';
                        echo('</td>');
                        echo('</tr>');        
                    }
                ?>
            <tbody>
        </table>

        <form action="/admin/user/form" method="post">
            <button class="button" type="submit">Ajout utilisateur</button> 
        </form>
    </div>

    <?php require 'footer.php' ?>

</body>