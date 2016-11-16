<?php

//data/PersoonDAO.php
require_once("entities/Persoon.php");
require_once("DBConfig.php");

class PersoonDAO {
    /* public function getAll() {
      $lijst = array();
      array_push($lijst, new Persoon("Peeters", "Bram"));
      array_push($lijst, new Persoon("Van Dessel", "Rudy"));
      array_push($lijst, new Persoon("Vereecken", "Marie"));
      array_push($lijst, new Persoon("Maes", "Eveline"));
      return $lijst;
      } */

    public function getAll() {
        $sql = "select familienaam, voornaam from personen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $persoon = new Persoon($rij["familienaam"], $rij["voornaam"]);
            array_push($lijst, $persoon);
        }
        $dbh = null;
        return $lijst;
    }

}
