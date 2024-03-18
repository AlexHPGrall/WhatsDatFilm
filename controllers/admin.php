<?php
     class admin
     {

          public static function index()
          {  
               $uri = $_SERVER['REQUEST_URI'];  
               $uri = rtrim($uri,"/");
            
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
                    admin::{$accessMethod}();
               }

          } 

          public static function userform()
          {
               $user=new User("" , "");
               echo $user->getUserLogin();
               include($_SERVER['DOCUMENT_ROOT'].'/views/form.php');
          }

          public static function useredit()
          {
               $user = new User("", "");
        
               $user->getUserFromId($_POST['userId']);

               include($_SERVER['DOCUMENT_ROOT'].'/views/edit.php');
          }

          public static function userdelete()
          {
               $user = new User("", "");
        
               $user->deleteUserFromId($_POST['userId']);
        
               header("Location: /admin/user");
                    die();
          } 

          public static function userupdate()
          {
               $user=new User($_POST['user'] , $_POST['pass']);
            
               $user->setUserFirstName($_POST['firstName']);
               $user->setUserLastName($_POST['lastName']);
               $user->setUserEmail($_POST['email']);
               $user->updateUser();
          
               header("Location: /Admin/User");
               die();
          } 

     }  

?>