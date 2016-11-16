<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModuleLijst
 *
 * @author manj
 */
class ModuleLijst {

    public function getLijst($minimum, $maximum) {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");
//positionele params
        /* $sql = "select familienaam, voornaam from personen
          where familienaam = ? and geslacht = ? ";
          $stmt = $dbh->prepare($sql);
          $stmt->execute(array($familienaam, $geslacht));
          $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); */
//benoemde params
        $sql = "select naam, prijs from modules
where prijs between :min and :max ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':min' => $minimum, ':max' => $maximum));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $text = $rij["naam"] . " (" . $rij["prijs"] . " euro)";
            array_push($lijst, $text);
        }
        $dbh = null;
        return $lijst;
    }

}
