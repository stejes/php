<?php

class Slot {

    private $rijnummer;
    private $kolomnummer;
    private $status;

    public function __construct($rijnr, $kolomnr, $status) {
        $this->rijnummer = $rijnr;
        $this->kolomnummer = $kolomnr;
        $this->status = $status;
    }

    public function getRijnummer() {
        return $this->rijnummer;
    }

    public function getKolomnummer() {
        return $this->kolomnummer;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
}