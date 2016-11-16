<?php

//dbGegevensOphalen.php
class PersonenLijst {

    public function getLijst() {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");
        $resultSet = $dbh->query("select familienaam, voornaam
from personen");
        $lijst = array();
        foreach ($resultSet as $rij) {
            $naam = $rij["familienaam"] . ", " . $rij["voornaam"];
            array_push($lijst, $naam);
            
        }
        sort($lijst);
        $dbh = null;
        return $lijst;
    }

}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Databanken introductie</title>
    </head>
    <body>
        <?php
        $pl = new PersonenLijst();
        $tab = $pl->getLijst();
        ?>
        <ul>
            <?php
            foreach ($tab as $naam) {
                print("<li>" . $naam . "</li>");
            }
            ?>
        </ul>
    </body>
</html>