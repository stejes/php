<?php

class Bericht {

    private $nickname;
    private $boodschap;
    private $id;
    private $datum;

    public function __construct($id, $boodschap, $nickname, $datum) {
        $this->id = $id;
        $this->boodschap = $boodschap;
        $this->nickname = $nickname;
        $this->datum = $datum;
    }

    public function getId() {
        return $this->id;
    }

    public function getNickname() {
        return $this->nickname;
    }

    public function getBoodschap() {
        return $this->boodschap;
    }
    
    public function setNickname($nickname) {
        $this->auteur = $auteur;
    }

    public function setBoodschap($boodschap) {
        $this->boodschap = $boodschap;
    }
    
    public function getDatum(){
        return $this->datum;
    }
    
    public function setDatum($datum){
        $this->datum = $datum;
    }
    
}