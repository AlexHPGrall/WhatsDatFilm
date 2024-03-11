<?php

class Actor extends Bdd{

    private $actorId;
    private $actorName;

    public function __construct($actorId, $actorName)
    {
        Bdd::__construct();
        $this->actorId = $actorId;
        $this->actorName = $actorName;
    }

    // Getters and setters for id and name properties

    public function getId()
    {
        return $this->actorId;
    }

    public function getName()
    {
        return $this->actorName;
    }

    public function setName($actorName)
    {
        $this->actorName = $actorName;
    }

    // Database methods

    public function getMoviesByActor($actorId)
    {
        $req = $this->bdd->prepare('SELECT movieId FROM MOVIEACTOR WHERE actorId =:actorId');
        $req->execute(array('actorId' => $actorId));
        return $req->fetchAll();
    }

    public function getActorById($actorId)
    {
        $req = $this->bdd->prepare('SELECT * FROM ACTOR WHERE actorId =:actorId');
        $req->execute(array('actorId' => $actorId));
        return $req->fetch();
    }

    public function getAllActors()
    {
        $req = $this->bdd->prepare('SELECT * FROM ACTOR');
        $req->execute();
        return $req->fetchAll();
    }

    public function getActorIdByName($actorName)
    {
        $req = $this->bdd->prepare('SELECT actorId FROM ACTOR WHERE actorName =:actorName');
        $req->execute(array('actorName' => $actorName));
        return $req->fetch();
    }

    public function getActorByName($actorName)
    {
        $req = $this->bdd->prepare('SELECT * FROM ACTOR WHERE actorName =:actorName');
        $req->execute(array('actorName' => $actorName));
        return $req->fetch();
    }
}