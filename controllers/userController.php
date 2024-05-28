<?php

class userController {

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

        if ($accessMethod == "") {
            userController::home();
        } else {
            userController::$accessMethod();
        }

    } 

    public static function home() {
        include($_SERVER['DOCUMENT_ROOT'].'/views/useredit.php');
    }

    public static function edit() {
        $user=new User($_POST['user'] , $_POST['pass']);
            
        $user->setUserFirstName($_POST['firstName']);
        $user->setUserLastName($_POST['lastName']);
        $user->setUserEmail($_POST['email']);
        $user->updateUser();
          
        header("Location: /userController");
        die();

    }

}