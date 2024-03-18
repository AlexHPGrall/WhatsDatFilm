<?php

class Admin extends Bdd
{
    private $adminId;
    private $userId;

    public function __construct($adminId, $userId)
    {
        Bdd::__construct();
        $this->adminId = $adminId;
        $this->userId = $userId;
    }

    // Getters and setters for id and name properties

    public function getAdminId()
    {
        return $this->adminId;
    }

    public function setAdminId($adminId)
    {
        $this->adminId = $adminId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    // Database methods

    public function getAdminByUserId($userId)
    {
        $req = $this->bdd->prepare('SELECT adminId FROM admin WHERE userId =:userId');
        $req->execute(array('userId' => $userId));
        return $req->fetch();
    }

    public function getAdminById($adminId)
    {
        $req = $this->bdd->prepare('SELECT * FROM admin WHERE adminId =:adminId');
        $req->execute(array('adminId' => $adminId));
        return $req->fetch();
    }

    public function getAllAdmins()
    {
        $req = $this->bdd->prepare('SELECT * FROM admin');
        $req->execute();
        return $req->fetchAll();
    }
}
