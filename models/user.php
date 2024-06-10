<?php

class User extends Bdd
{
    private $userId;
    private $userLogin;
    private $userPassword;
    private $userFirstName;
    private $userLastName;
    private $userEmail;
    private $userToken;
    private $is_verified;

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

    public function getUserToken()
    {
        return $this->userToken;
    }

    public function isUserVerified()
{
    return $this->is_verified;
}

    public function getLoginCredentials($loginInput)
    {
        $req = $this->bdd->prepare('SELECT userLogin, userPassword FROM user WHERE userLogin =:login ');
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
        $this->userPassword = password_hash($passwordInput, PASSWORD_DEFAULT);
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

    public function setUserToken($token)
    {
        $this->userToken = $token;
    }

    public function readUser()
    {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE userLogin =:login');
        $req->execute(array('login' => $this->userLogin));
        $donnees = $req->fetch();
        if ($donnees) {
            $this->setUserId($donnees['userId']);
            $this->setUserFirstName($donnees['userFirstName']);
            $this->setUserLastName($donnees['userLastName']);
            $this->setUserEmail($donnees['userEmail']);
            $this->setUserToken($donnees['userToken']);
            $this->is_verified= $donnees['is_verified'];
        }
    }

    public function addUser()
    {
        $req = $this->bdd->prepare('INSERT INTO user (userLogin, userPassword, userFirstName, userLastName, userEmail, userToken) VALUES (:login, :password, :firstName, :lastName, :email, :token)');
        return $req->execute(array(
            'login' => $this->userLogin,
            'password' => $this->userPassword,
            'firstName' => $this->userFirstName,
            'lastName' => $this->userLastName,
            'email' => $this->userEmail,
            'token' =>$this->userToken
        ));
    }

    public function updateUser()
    {
        $req = $this->bdd->prepare('UPDATE user SET  userFirstName = :firstName, userLastName = :lastName, userEmail = :email, userToken = :token WHERE userLogin = :login AND userPassword = :password');
        $req->execute(array(
            'firstName' => $this->userFirstName,
            'lastName' => $this->userLastName,
            'email' => $this->userEmail,
            'login' => $this->userLogin,
            'password' => $this->userPassword,
            'token' =>$this->userToken
        ));
    }

    public function deleteUser()
    {
        $req = $this->bdd->prepare('DELETE FROM user WHERE userLogin = :login AND userPassword = :password');
        $req->execute(array(
            'login' => $this->userLogin,
            'password' => $this->userPassword
        ));
    }

    public function getAllUsers()
    {
        $reponse = $this->bdd->query('SELECT * FROM user');
        $table = array();
        while ($donnees = $reponse->fetch()) {
            $table[] = $donnees;
        }
        return $table;
    }


    public function deleteUserFromId($id)
    {
        $req = $this->bdd->prepare('DELETE FROM user WHERE userId = :id');
        $req->execute(array(
            'id' => $id
        ));
    }

    public function getUserFromId($id) 
    {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE userId = :id');
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
            $this->setUserToken($donnees['userToken']);
            $this->is_verified= $donnees['is_verified'];
        }
    }

    public function updateUserFromId($id) 
    {
        $req = $this->bdd->prepare('UPDATE user SET  userFirstName = :firstName, userLastName = :lastName, userEmail = :email, userToken = :token, userLogin = :login, userPassword = :password 
        WHERE userId = :id');
        $req->execute(array(
            'firstName' => $this->userFirstName,
            'lastName' => $this->userLastName,
            'email' => $this->userEmail,
            'login' => $this->userLogin,
            'password' => $this->userPassword,
            'token' =>$this->userToken,
            'id' => $id
        ));
    }

    public function getUserFromToken($token) 
    {
        $req = $this->bdd->prepare('SELECT * FROM user WHERE userToken = :token');
        $req->execute(array(
            'token' => $token
        ));

        $donnees = $req->fetch();
        if ($donnees) {
            $this->setUserId($donnees['userId']);
            $this->setUserLogin($donnees['userLogin']);
            $this->setUserPassword($donnees['userPassword']);
            $this->setUserFirstName($donnees['userFirstName']);
            $this->setUserLastName($donnees['userLastName']);
            $this->setUserEmail($donnees['userEmail']);
            $this->setUserToken($donnees['userToken']);
            $this->is_verified= $donnees['is_verified'];
        }
    }

    public function verifyUser($id) 
    {
        $req = $this->bdd->prepare('UPDATE user SET is_verified = 1 WHERE userId = :id');
        $req->execute(array(
            'id' => $id
        ));
    }


}
