<?php

class Bdd
{
    protected $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=webdb', 'root', '');
            // Activer les erreurs PDO
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Gérer les exceptions PDO
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            exit(); // Arrêter l'exécution du script en cas d'erreur
        }
    }
}
