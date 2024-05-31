<!DOCTYPE html>
<html lang="fr">

<!-- Vue intégrée à la page admin, c'est le tableau des utilisateurs enregistrés -->

<div class="tableSearch">
    <input id="string" type="text" placeholder="bar de recherche" class="tableSearchElmt">
    <button class="btn tableSearchElmt" type="button" id="search">Rechercher</button>
    <button class="btn tableSearchElmt" type="button" id="reset">Réinitialiser</button>
</div>

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
                foreach($table as $userData): ?>
                        <tr>
                        <td><?= $userData['userId'] ?></td>
                        <td><?= $userData['userLogin'] ?></td>
                        <td><?= $userData['userPassword'] ?></td>
                        <td><?= $userData['userFirstName'] ?></td>
                        <td><?= $userData['userLastName'] ?></td>
                        <td><?= $userData['userEmail'] ?></td>
                        <td>
                        <form action="/adminController/user/delete" method="post" name="delete">
                            <button class="btn" type="submit" name="userId" value="<?= $userData["userId"] ?>">Supprimer</button> 
                        </form>
                <form action="/adminController/user/edit" method="post">
                            <button class="btn" type="submit" name="userId" value="<?= $userData["userId"] ?>">Edit</button> 
                        </form>
                </td>
                </tr>
            <?php endforeach; ?>
        <tbody>
    </table>

</div>

<form action="/adminController/user/form" method="post" name="add">
    <button class="btn" type="submit">Ajouter un utilisateur</button>
</form>