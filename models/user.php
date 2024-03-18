<?php

include("Bdd.php");
class User extends Bdd
{
    private $userId;
    private $userLogin;
    private $userPassword;
    private $userFirstName;
    private $userLastName;
    private $userEmail;

    public function __construct($loginInput, $passInput)
    {
        Bdd::__construct();
        $this->userLogin    =    $loginInput;
        $this->userPassword =    $passInput;
    }

    public function getUserFirstName()
    {
        return $this->userFirstName;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function getUserLogin()
    {
        return $this->userLogin;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function getLoginCredentials($loginInput)
    {
        $req = $this->bdd->prepare('SELECT userLogin, userPassword FROM USER WHERE userLogin =:login ');
        $req->execute(array('login' => $loginInput));
        return $req->fetch();
    }

    private function setUserId($idInput)
    {
        $this->userId = $idInput;
    }

    public function setUserLogin($loginInput)
    {
        $this->userLogin = $loginInput;
    }

    public function setUserPassword($passwordInput)
    {
        $this->userPassword = $passwordInput;
    }

    public function setUserEmail($emailInput)
    {
        $this->userEmail = $emailInput;
    }

    public function setUserFirstName($firstNameInput)
    {
        $this->userFirstName = $firstNameInput;
    }

    public function setUserLastName($lastNameInput)
    {
        $this->userLastName = $lastNameInput;
    }

    public function readUser()
    {
        $req = $this->bdd->prepare('SELECT * FROM USER WHERE userLogin =:login  AND userPassword =:pass');
        $req->execute(array('login' => $this->userLogin, 'pass' => $this->userPassword));
        $donnees = $req->fetch();
        if ($donnees) {
            $this->setUserId($donnees['userId']);
            $this->setUserFirstName($donnees['userFirstName']);
            $this->setUserLastName($donnees['userLastName']);
            $this->setUserEmail($donnees['userEmail']);
        }
    }

    public function addUser()
    {
        $req = $this->bdd->prepare('INSERT INTO User (userLogin, userPassword, userFirstName, userLastName, userEmail) VALUES (:login, :password, :firstName, :lastName, :email)');
        return $req->execute(array(
            'login' => $this->userLogin,
            'password' => $this->userPassword,
            'firstName' => $this->userFirstName,
            'lastName' => $this->userLastName,
            'email' => $this->userEmail
        ));
    }

    public function updateUser()
    {
        $req = $this->bdd->prepare('UPDATE User SET  userFirstName = :firstName, userLastName = :lastName, userEmail = :email WHERE userLogin = :login AND userPassword = :password');
        $req->execute(array(
            'firstName' => $this->userFirstName,
            'lastName' => $this->userLastName,
            'email' => $this->userEmail,
            'login' => $this->userLogin,
            'password' => $this->userPassword
        ));
    }

    public function deleteUser()
    {
        $req = $this->bdd->prepare('DELETE FROM User WHERE userLogin = :login AND userPassword = :password');
        $req->execute(array(
            'login' => $this->userLogin,
            'password' => $this->userPassword
        ));
    }

    public function getAllUsers()
    {
        $reponse = $this->bdd->query('SELECT * FROM USER');
        $table = array();
        while ($donnees = $reponse->fetch()) {
            $table[] = $donnees;
        }
        return $table;
    }


    public function deleteUserFromId($id)
    {
        $req = $this->bdd->prepare('DELETE FROM User WHERE userId = :id');
        $req->execute(array(
            'id' => $id
        ));
    }
    public function getUserFromId($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM User WHERE userId = :id');
        $req->execute(array(
            'id' => $id
        ));

        $donnees = $req->fetch();
        if ($donnees) {

            $this->setUserId($donnees['userId']);
            $this->setUserLogin($donnees['userLogin']);
            $this->setUserPassword($donnees['userPassword']);
            $this->setUserFirstName($donnees['userFirstName']);
            $this->setUserLastName($donnees['userLastName']);
            $this->setUserEmail($donnees['userEmail']);
        }
    }
}
