<?php

//helloworld.php
class GreetingGenerator {

    public function getGreeting() {
        return date("d/m/Y - H:i:s");
    }

}

class Rekenmachine {

    public function getKwadraat($getal) {
        $kwad = $getal * $getal;
        return $kwad;
    }

    public function getSom($getal1, $getal2) {
        $resultaat = $getal1 + $getal2;
        return $resultaat;
    }

    public function getProduct($getal1, $getal2) {
        $resultaat = $getal1 * $getal2;
        return $resultaat;
    }

}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Hello world</title>
        <style type="text/css">
            h1 { color: red; }
        </style>
    </head>
    <body>
        <h1>
            <?php
            $gg = new GreetingGenerator();
            print($gg->getGreeting());
            ?>
        </h1>
        <h1>
            <?php
            $reken = new Rekenmachine();
            print($reken->getKwadraat(5));
            ?>
        </h1>
        <h1>
            <?php
            print($reken->getProduct(34, 2));
            ?>
        </h1>

    </body>
</html>