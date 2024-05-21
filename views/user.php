<!DOCTYPE html>
<html lang="fr">

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
                <th></th>
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
                        '<form action="/Admin/User/Delete" method="post" name="delete">
                            <button type="submit" name="userId" value="'.$userData["userId"].'">Supprimer</button> 
                        </form>',
                        '<form action="/Admin/User/Edit" method="post" name="edit">
                            <button type="submit" name="userId" value="'.$userData["userId"].'">Modifier</button> 
                        </form>',
                '</td>',
                '</tr>';
            }
            ?>
        <tbody>
    </table>

</div>

<form action="/admin/user/form" method="post">
    <button type="submit">Ajout utilisateur</button>
</form>