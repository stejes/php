<?php

//productentest.php
class Product {

    public $prijs = 50;
    protected $type = 'bureaustoel';
    private $kleur = 'rood';

    public function getPrijs() {
        return $this->prijs;
    }

    public function getType() {
        return $this->type;
    }

    public function getKleur() {
        return $this->kleur;
    }

}

class Stoel extends Product {

    public function printer() {
//print($this->prijs);//50 (public $prijs)
//print($this->type);//bureaustoel (protected $type)
//print($this->kleur);//fout (private $kleur)
    }

}

$stoel = new Stoel();
//we vragen eigenschappen op via de public methods :
//print($stoel->getPrijs());//50
//print($stoel->getType());//bureaustoel
//print($stoel->getKleur());//rood


//we spreken de variabelen rechtstreeks aan :
//print($stoel->prijs);//50 (public $prijs)
//print($stoel->type);//fout (protected $type)
//print($stoel->kleur);//fout (private $kleur)
//we spreken de variabelen rechtstreeks aan in de afgeleide klas :
$stoel->printer(); //50 bureaustoel fout
?>