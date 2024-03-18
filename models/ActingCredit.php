<?php

class ActingCredit extends Bdd
{

    private $creditId;
    private $characterName;
    private $actorId;
    private $movieId;

    public function __construct($creditId, $characterName, $actorId, $movieId)
    {
        Bdd::__construct();
        $this->creditId = $creditId;
        $this->characterName = $characterName;
        $this->actorId = $actorId;
        $this->movieId = $movieId;
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
