<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8" />
 <title>Vue Admin</title>
 <link rel="stylesheet" href="/style.css">
</head>

<body>

<<<<<<< HEAD
    <?php require 'header.php' ?>
    <form action="/logout" method="post">
        <button type="submit">Déconnexion</button> 
    </form>

    <main class="centeredMain">

        <?php require 'user.php'?>

        <form action="/admin/user/form" method="post">
            <button class="button" type="submit">Ajout utilisateur</button> 
        </form>

        <input id="string" type="text">
        <button class="button" type="button" id="search">Rechercher</button>
        <button class="button" type="button" id="reset">Réinitialiser</button>

    </main>

    <?php require 'footer.php' ?>
=======
<?php require 'header.php' ?>
<h2>Users</h2>
<form action="/logout" method="post">
              <button type="submit">Logout</button> 
            </form>
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
        echo '<form action="/Admin/User/Delete" method="post">
              <button type="submit" name="userId" value="';
        echo $userData["userId"];
        echo '">Delete</button> </form>';
        echo '<form action="/Admin/User/Edit" method="post">
        <button type="submit" name="userId" value="';
        echo $userData["userId"];
        echo '">Edit</button> </form>';
        echo('</td>');
        echo('</tr>');
        
    }
 ?>
       
        <tbody>
    </table>
    <form action="/Admin/User/Form" method="post">
              <button type="submit">Add User</button> 
            </form>
</div>
<?php require 'footer.php' ?>
>>>>>>> origin/main

    <script src="/jquery.js"></script>
    <script src="/views/table.js"></script>

</body>