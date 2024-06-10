<?php
require_once 'bdd.php';
include_once("models/user.php");

class verifyController {

    public static function index()
    {  
        if(isset($_GET['token']))
        {
            $token = $_GET['token'];
            $user = new User('','');
            try
            {
                $user->getUserFromToken($token);

                if($user->getUserId() == '')
                {
                    throw new Error('token invalide');
                }

                $user->verifyUser($user->getUserId());
                include($_SERVER['DOCUMENT_ROOT'].'/views/verifyOk.php');
                
            }
            catch(Error $e)
            {
                include($_SERVER['DOCUMENT_ROOT'].'/views/badVerify.php');
            }
        }
        }
    }

?>