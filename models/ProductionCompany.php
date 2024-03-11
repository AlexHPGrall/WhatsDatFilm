<?php

class ProductionCompany extends Bdd{

    private $productionCompanyId;
    private $productionCompanyName;
    private $productionCompanyCountry;
    private $productionCompanyLogoUrl;

    public function __construct($id, $name, $country, $logoUrl)
    {
        Bdd::__construct();
        $this->productionCompanyId = $id;
        $this->productionCompanyName = $name;
        $this->productionCompanyCountry = $country;
        $this->productionCompanyLogoUrl = $logoUrl;
    }

    // Getters and Setters

    public function getId()
    {
        return $this->productionCompanyId;
    }

    public function getName()
    {
        return $this->productionCompanyName;
    }

    public function setName($name)
    {
        $this->productionCompanyName = $name;
    }

    public function getCountry()
    {
        return $this->productionCompanyCountry;
    }

    public function setCountry($country)
    {
        $this->productionCompanyCountry = $country;
    }

    public function getLogoUrl()
    {
        return $this->productionCompanyLogoUrl;
    }

    public function setLogoUrl($logoUrl)
    {
        $this->productionCompanyLogoUrl = $logoUrl;
    }

    // Database methods

    public function getProductionCompanyById($id)
    {
        $req = $this->bdd->prepare('SELECT * FROM production_company WHERE productionCompanyId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getAllProductionCompanies()
    {
        $req = $this->bdd->prepare('SELECT * FROM production_company');
        $req->execute();
        return $req->fetchAll();
    }

    public function getProductionCompanyIdByName($name)
    {
        $req = $this->bdd->prepare('SELECT productionCompanyId FROM production_company WHERE productionCompanyName =:name');
        $req->execute(array('name' => $name));
        return $req->fetch();
    }

    public function getProductionCompanyNameById($id)
    {
        $req = $this->bdd->prepare('SELECT productionCompanyName FROM production_company WHERE productionCompanyId =:id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function save()
    {
        $req = $this->bdd->prepare('INSERT INTO production_company (productionCompanyName, productionCompanyCountry, productionCompanyLogoUrl) VALUES (:name, :country, :logoUrl)');
        $req->execute(array('name' => $this->productionCompanyName, 'country' => $this->productionCompanyCountry, 'logoUrl' => $this->productionCompanyLogoUrl));
    }
}