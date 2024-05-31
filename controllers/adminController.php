<?php
include_once("models/bdd.php");
include_once("models/user.php");
include_once("models/Movie.php");


     class adminController
     {

          public static function index()
          {  
               $uri = $_SERVER['REQUEST_URI'];  
               $uri = rtrim($uri,"/");
               
               $list= explode("/", strtolower($uri));  
               $accessMethod = "";
               //concatenation des token pour appeler la bonne methode
               for($i=2; $i<count($list); $i++)
               {
                    $accessMethod = $accessMethod.$list[$i];
               }
               
               try {
                    adminController::{$accessMethod}();
               } catch (Error $e){
                    adminController::home();
               }

          } 


          public static function api()
          {
               $headerView = "headerAdminMovie.php";
               include($_SERVER['DOCUMENT_ROOT'].'/views/testapiview.php');
          }

          public static function user()
          {
               $user = new User("", "");
               $table = $user->getAllUsers();
               $adminView= "user.php";
               $headerView = "headerAdminUser.php";
               include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
          }

          public static function userupdate()
          {
               $user=new User($_POST['user'] , $_POST['pass']);
            
               $user->setUserFirstName($_POST['firstName']);
               $user->setUserLastName($_POST['lastName']);
               $user->setUserEmail($_POST['email']);
               $user->updateUser();
          
               header("Location: /adminController/user");
               die();

          } 

          public static function userform()
          {
               $user=new User("" , "");
               echo $user->getUserLogin();
               $headerView = "headerAdminUser.php";
               include($_SERVER['DOCUMENT_ROOT'].'/views/form.php');
          }

          public static function userdelete()
          {
               $user = new User("", "");
        
               $user->deleteUserFromId($_POST['userId']);
        
               header("Location: /adminController/user");
               die();
          } 
       
          public static function useredit()
          {
               $user = new User("", "");
        
               $user->getUserFromId($_POST['userId']);
               include($_SERVER['DOCUMENT_ROOT'].'/views/edit.php');

          } 

          public static function useradd()
          {
               $user=new User($_POST['user'] , $_POST['pass']);
            
               $user->setUserFirstName($_POST['firstName']);
               $user->setUserLastName($_POST['lastName']);
               $user->setUserEmail($_POST['email']);
               $user->addUser();
          
               header("Location: /adminController/user");
               die();
          } 

          public static function movie()
          {
               $movie = new Movie("", "", "", "", "", "", "");
               $table = $movie->getAllMovies();
               $adminView = "movies.php";
               $headerView = "headerAdminMovie.php";
               include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
          }

          public static function movieDelete()
          {
               $movie = new Movie("", "", "", "", "", "", "");
        
               $movie->deleteMovieFromId($_POST['movieId']);
        
               header("Location: /Controller/movie");
               die();
          } 

          public static function home()
          {
               $adminView = "adminhome.php";
               $headerView = "headerAdminHome.php";
               include($_SERVER['DOCUMENT_ROOT'].'/views/admin.php');
          }


     }  

?>