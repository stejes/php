<?php
include_once 'data/UserDAO.php';
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
        $userDao = new UserDAO();
        $user = $userDao->getValidUser($gebruikersnaam, $wachtwoord);
        if(isset($user)){
            return true;
        }
        return false;
    }

}
