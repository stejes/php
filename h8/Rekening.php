<?php

/**
 * Description of Rekening
 *
 * @author manj
 */
abstract class Rekening {
    private $rekeningnr;
    private $saldo;
    
    
    public function __construct($rekeningnr) {
        $this->rekeningnr = $rekeningnr;
        $this->saldo = 0;
    }
    
    public function stort($bedrag){
        $this->saldo += $bedrag;
    }
    
    public function getSaldo(){
        return $this->saldo;
    }
    
    abstract public function voerIntrestDoor();
}

interface Omschrijving{
    public function getOmschrijving();
}

class Zichtrekening extends Rekening implements Omschrijving{
    private static $intrest = 0.025;
    
    public function voerIntrestDoor(){
        $this->stort($this->getSaldo() * self::$intrest);
    }
    
    public function getOmschrijving() {
        return "Kortetermijnrekening";
    }
}

class Spaarrekening extends Rekening{
    private static $intrest = 0.03;
    
    public function voerIntrestDoor(){
        $this->stort($this->getSaldo() * self::$intrest);
    }
    
    public function getOmschrijving() {
        return "Langetermijnrekening";
    }
}
