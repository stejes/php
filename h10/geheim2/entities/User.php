<?php

/**
 * Description of User
 *
 * @author steven.jespers
 */
class User {
    private $gebruikersnaam;
    private $wachtwoord;
    
    public function __construct($gebruikersnaam, $wachtwoord){
        $this->gebruikersnaam = $gebruikersnaam;
        $this->wachtwoord = $wachtwoord;
    }
    
    function getGebruikersnaam() {
        return $this->gebruikersnaam;
    }

    function getWachtwoord() {
        return $this->wachtwoord;
    }


}
