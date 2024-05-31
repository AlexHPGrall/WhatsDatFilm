<?php

class loginController {

    public static function index()
    {  

        $uri = $_SERVER['REQUEST_URI'];  
        $uri = rtrim($uri,"/");
            
        $list= explode("/", strtolower($uri));  
        $accessMethod = "";

        for($i=2; $i<count($list); $i++)
        {
            $accessMethod = $accessMethod.$list[$i];
            if ($accessMethod == "adminController" || $accessMethod == "userController") {
                loginController::login();
            }
        }

        if ($accessMethod != "") {
            try {
                loginController::$accessMethod();
            } catch(Error $e) {
                include($_SERVER['DOCUMENT_ROOT'].'/views/404.php');
            }
        }
        else {
            loginController::login();
        }

    } 

    public static function login() 
    {
        if (self::isLoggedIn()) {
            adminController::user();
        }
        else {
            $headerView = "headerLogin.php";
            include($_SERVER['DOCUMENT_ROOT'].'/views/login.php');
        }
    }

    public static function isLoggedIn() {
        return isset($_SESSION['userId']);
    }

    public static function log() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['userName'];
            $password = $_POST['userPassword'];
            include_once("models/bdd.php");
            include_once("models/user.php");

            $user = new User($username, $password);

            $cred = $user->getLoginCredentials($username);

            if ($cred && $cred['userPassword'] == $password) {
                $user->readUser();
                $_SESSION['userId'] = $user->getUserId();
                header("Location: /gameController/home");
                exit;
            }
            else {
                header("Location: /login");
                exit;
            }

        } else {
            header("Location: /login");
            exit;
        }

    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /login");
    }

    public static function signin()
    {
        $headerView = "headerLogin.php";

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once("models/bdd.php");
        include_once("models/user.php");
        $user = new User($_POST['user'], $_POST['pass']);

        $user->setUserFirstName($_POST['firstName']);
        $user->setUserLastName($_POST['lastName']);
        $user->setUserEmail($_POST['email']);
        if ($user->addUser()) {
            $user->readUser();

            $_SESSION['userId'] = $user->getUserId();
            header("Location: /gameController/home"); //à changer
            exit;
        }

        header("Location: login.php");
        exit;
        } else {
            include('views/signin.php');
        }
    }

}