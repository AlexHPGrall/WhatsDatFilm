<?php
 class admin
 {

       public static function index()
       {
            $uri = $_SERVER['REQUEST_URI'];  
            $list= explode("/", strtolower($uri));  
            $accessMethod = "";
            for($i=2; $i<count($list); $i++)
            {
                $accessMethod = $accessMethod.$list[$i];
            }
            if(count($list)<4)
            {
                $user = new User("", "");
                $table = $user->getAllUsers();
                include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
            }
            else
            {
                //echo($accessMethod);
                admin::{$accessMethod}();
            }

       } 

       public static function useradd()
       {
            $user=new User($_POST['user'] , $_POST['pass']);
            
            $user->setUserFirstName($_POST['firstName']);
            $user->setUserLastName($_POST['lastName']);
            $user->setUserEmail($_POST['email']);
            $user->addUser();
          
            $table = $user->getAllUsers();
            include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
       } 

       public static function userform()
       {
            include($_SERVER['DOCUMENT_ROOT'].'/views/form.php');
       }

       public static function userdelete()
       {
            $user = new User("", "");
        
            $user->deleteFromId($_POST['userId']);
        
            $table = $user->getAllUsers();
            include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
       } 

 }  

?>