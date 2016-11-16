<?php

class Oefening {

    public function getAnalyse($getal1, $getal2) {
        //$vgl = ($getal1-$getal2) > 0;
        if($getal1 > $getal2){
            return "Het eerst is groter dan het tweede";
        }
        else if($getal1 == $getal2){
            return "Het eerste is even groot als het tweede";
        }
        else{
            return "Het eerste getal is kleiner dan het tweede";
        }
    }

}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Analyse</title>
    </head>
    <body>
        <h1>
            <?php
            $oef = new Oefening();
            print($oef->getAnalyse(2, 8));
            ?>
        </h1>
    </body>
</html>
