<?php

include_once 'DBConfig.php';
include_once 'entities/User.php';
class UserDAO {
     public function getValidUser($gebruikersnaam, $wachtwoord) {
        $sql = "select gebruikersnaam from gebruikers
where gebruikersnaam = :gebruikersnaam and wachtwoord = :wachtwoord";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $wachtwoord));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        if($rij){
            $user = new User($gebruikersnaam, $wachtwoord);
            return $user;
        }
        return null;
        
    }
}
