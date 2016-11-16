<?php

class Film {

    private $titel;
    private $duurtijd;
    private $id;

    public function __construct($id, $duurtijd, $titel) {
        $this->id = $id;
        $this->duurtijd = $duurtijd;
        $this->titel = $titel;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitel() {
        return $this->titel;
    }

    public function getDuurtijd() {
        return $this->duurtijd;
    }
    
    public function setTitel($titel) {
        $this->titel = $titel;
    }

    public function setDuurtijd($duurtijd) {
        $this->duurtijd = $duurtijd;
    }

}