<?php
 class admin
 {

       public static function index()
       {
            $user = new User("", "");
            $table = $user->getAllUsers();
            include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
       } 

       public static function add()
       {
            $user=new User($_POST['user'] , $_POST['pass']);
            $user->setUserFirstName($_POST['firstName']);
            $user->setUserLastName($_POST['lastName']);
            $user->setUserEmail($_POST['email']);
            $user->addUser();
        
            $table = $user->getAllUsers();
            include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
       } 

       public static function form()
       {
            include($_SERVER['DOCUMENT_ROOT'].'/views/form.php');
       }

       public static function delete()
       {
            $user = new User("", "");
        
            $user->deleteFromId($_POST['userId']);
        
            $table = $user->getAllUsers();
            include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
       } 

 }  

?>