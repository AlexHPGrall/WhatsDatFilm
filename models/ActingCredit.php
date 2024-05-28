<?php

require_once 'bdd.php';
class ActingCredit extends Bdd
{

    private $creditId;
    private $movieId;
    private $actorId;
    private $characterName;

    public function __construct($creditId, $movieId, $actorId, $characterName)
    {
        Bdd::__construct();
        $this->creditId = $creditId;
        $this->movieId = $movieId;
        $this->actorId = $actorId;
        $this->characterName = $characterName;
    }

    // Getters and setters for id and name properties

    public function getCreditId()
    {
        return $this->creditId;
    }

    public function setCreditId($creditId)
    {
        $this->creditId = $creditId;
    }

    public function getCharacterName()
    {
        return $this->characterName;
    }

    public function setCharacterName($characterName)
    {
        $this->characterName = $characterName;
    }

    public function getActorId()
    {
        return $this->actorId;
    }

    public function setActorId($actorId)
    {
        $this->actorId = $actorId;
    }

    public function getMovieId()
    {
        return $this->movieId;
    }

    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }

    // Database methods

    public function getActingCreditsByActor($actorId)
    {
        $req = $this->bdd->prepare('SELECT creditId FROM acting_credit WHERE actorId =:actorId');
        $req->execute(array('actorId' => $actorId));
        return $req->fetchAll();
    }

    public function getActingCreditsByMovie($movieId)
    {
        $req = $this->bdd->prepare('SELECT creditId FROM acting_credit WHERE movieId =:movieId');
        $req->execute(array('movieId' => $movieId));
        return $req->fetchAll();
    }

    public function getActingCreditById($creditId)
    {
        $req = $this->bdd->prepare('SELECT * FROM acting_credit WHERE creditId =:creditId');
        $req->execute(array('creditId' => $creditId));
        return $req->fetch();
    }

    public function getAllActingCredits()
    {
        $req = $this->bdd->prepare('SELECT * FROM acting_credit');
        $req->execute();
        return $req->fetchAll();
    }

    public function addActingCredit()
    {
        $req = $this->bdd->prepare('INSERT IGNORE INTO acting_credit (creditId, movieId, actorId, characterName) VALUES (:creditId, :movieId, :actorId, :characterName)');
        $req->execute(array('creditId' => $this->creditId, 'movieId' => $this->movieId, 'actorId' => $this->actorId, 'characterName' => $this->characterName));
    }

    public function save()
    {
        $req = $this->bdd->prepare('INSERT INTO acting_credit (characterName, actorId, movieId) VALUES (:characterName, :actorId, :movieId)');
        $req->execute(array('characterName' => $this->characterName, 'actorId' => $this->actorId, 'movieId' => $this->movieId));
    }

    public function update()
    {
        $req = $this->bdd->prepare('UPDATE acting_credit SET characterName =:characterName, actorId =:actorId, movieId =:movieId WHERE creditId =:creditId');
        $req->execute(array('characterName' => $this->characterName, 'actorId' => $this->actorId, 'movieId' => $this->movieId, 'creditId' => $this->creditId));
    }

    public function delete()
    {
        $req = $this->bdd->prepare('DELETE FROM acting_credit WHERE creditId =:creditId');
        $req->execute(array('creditId' => $this->creditId));
    }
}
