<?php
require_once ('./Rekening.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Rekeningnummers</title>
    </head>
    <body>
        <h1>
            <?php
            $rek = new Zichtrekening("091-0122401-16");
            $rek2 = new Spaarrekening("2323-565-555");
            print("Het saldo is: " . $rek->getSaldo() . "<br />");
            $rek->stort(200);
            print("Het saldo is: " . $rek->getSaldo() . "<br />");
            $rek->voerIntrestDoor();
            print("Het saldo is: " . $rek->getSaldo() . "<br />");
            print("De omschrijving is: " . $rek->getOmschrijving() . "<br />");
            print("Het saldo is: " . $rek2->getSaldo() . "<br />");
            $rek2->stort(500);
            print("Het saldo is: " . $rek2->getSaldo() . "<br />");
            $rek2->voerIntrestDoor();
            print("Het saldo is: " . $rek2->getSaldo() . "<br />");
            print("De omschrijving is: " . $rek2->getOmschrijving() . "<br />");
            ?>
        </h1>
    </body>
</html>