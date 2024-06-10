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
            require_once("bdd.php");
            require_once("models/user.php");

            $user = new User($username, "");

            $cred = $user->getLoginCredentials($username);

            if (password_verify($password, $cred['userPassword'])) {
                $user->readUser();
                if($user->isUserVerified())
                {
                    $_SESSION['userId'] = $user->getUserId();
                    header("Location: /Game/home");
                    exit;
                }
                else {
                    header("Location: /login");
                    exit;
                }
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

    public static function singe() {
        $headerView = "headerLogin.php";
        include($_SERVER['DOCUMENT_ROOT'].'/views/signin.php');
    }

    public static function signin()
    {
        $headerView = "headerLogin.php";

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once("bdd.php");
        include_once("models/user.php");
        $user = new User($_POST['user'], password_hash($_POST['pass'], PASSWORD_DEFAULT));

        $user->setUserFirstName($_POST['firstName']);
        $user->setUserLastName($_POST['lastName']);
        $user->setUserEmail($_POST['email']);
        
        $token = bin2hex(random_bytes(32));
        $user->setUserToken($token);
        
        if ($user->addUser()) {


             ini_set('SMTP', 'smtp-watsdatfilm.alwaysdata.net');
ini_set('smtp_port', '587');
ini_set('sendmail_from', 'watsdatfilm@alwaysdata.net');


            $user->readUser();
            $email = $user->getUserEmail();
            $to = $email;
            $subject = "Verification E-Mail";
            $message = "Veuillez cliquer sur le lien ci-dessous pour activer votre compte WhatsDatFilm:\n";
            $message .= "https://watsdatfilm.alwaysdata.net/verify?token=$token";
            $headers = 'From: watsdatfilm@alwaysdata.net' . "\r\n" .
                       'Reply-To:watsdatfilm@alwaysdata.net' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

    

            if (mail($to, $subject, $message, $headers))
            {
                $_SESSION['userId'] = $user->getUserId();
                include('views/verify.php');
            }
            else
            {
                header("Location: login.php");
                exit;
            }
        }
        else
        {
            
        header("Location: login.php");
        exit;
        }

        } else {
            include('views/signin.php');
        }
    }



}