<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserService
 *
 * @author steven.jespers
 */
class UserService {

    public function checkLogin($gebruikersnaam, $wachtwoord) {
        if($gebruikersnaam == "admin" && $wachtwoord == "geheim"){
            return true;
        }
        else{
            return false;
        }
    }

}
