<?php

class Bdd
{
    protected $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=mysql-watsdatfilm.alwaysdata.net;dbname=watsdatfilm_webdb', "363160","CNAM_WEB_2024");
            // Activer les erreurs PDO
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Gérer les exceptions PDO
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit(); // Arrêter l'exécution du script en cas d'erreur
        }
    }
}