<?php

class Bdd
{
    protected $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=webdb', "root");
    }

}

?>