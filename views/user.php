<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Tableau utilisateur</title>
    <link rel="stylesheet" href="/views/styles.css">
</head>


<div class="tableWrapper">
    <table>
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
                    echo '<tr>',
                        '<td>'.$userData['userId'].'</td>',
                        '<td>'.$userData['userLogin'].'</td>',
                        '<td>'.$userData['userPassword'].'</td>',
                        '<td>'.$userData['userFirstName'].'</td>',
                        '<td>'.$userData['userLastName'].'</td>',
                        '<td>'.$userData['userEmail'].'</td>',
                        '<td>',
                        '<form action="/Admin/User/Delete" method="post">
                            <button type="submit" name="userId" value="'.$userData["userId"].'">Supprimer</button> 
                        </form>',
                        '<form action="/Admin/User/Edit" method="post">
                            <button type="submit" name="userId" value="'.$userData["userId"].'">Edit</button> 
                        </form>',
                        '</td>',
                    '</tr>';      
                }
            ?>
        <tbody>
    </table>

</div>