<?php

class Bericht {

    private $auteur;
    private $boodschap;
    private $id;
    private $datum;

    public function __construct($id, $boodschap, $auteur, $datum) {
        $this->id = $id;
        $this->boodschap = $boodschap;
        $this->auteur = $auteur;
        $this->datum = $datum;
    }

    public function getId() {
        return $this->id;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getBoodschap() {
        return $this->boodschap;
    }
    
    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function setBoodschap($boodschap) {
        $this->boodschap = $boodschap;
    }
    
}