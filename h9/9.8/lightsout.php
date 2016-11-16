<?php
require_once 'Spel.php';
session_start();


if (isset($_GET["actie"]) && $_GET["actie"] == "reset") {
    unset($_SESSION["spel"]);
}

if (!isset($_SESSION["spel"])) {
    /*$_SESSION["spel"] = new Spel(4, 4);*/
    $spel = new Spel(4, 4);
    $_SESSION["spel"] = $spel;
}
else {
    $spel = $_SESSION["spel"];
}




/*$spel = $_SESSION["spel"];*/

if (isset($_GET["rij"]) && isset($_GET["kolom"])) {
    $spel->doeZet($_GET["rij"], $_GET["kolom"]);
}
?>





<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lights out!</h1>
        <?php
        if ($spel->checkWinst()) {
            print "U hebt gewonnen";
        } else {
            for ($rij = 0; $rij < $spel->getRijen(); $rij++) {
                for ($kolom = 0; $kolom < $spel->getKolommen(); $kolom++) {
                    if ($spel->getValue($rij, $kolom) == 0) {
                        print "<a href='lightsout.php?rij=" . $rij . "&kolom=" . $kolom . "'>"
                                . "<img src='lightsout-uit.png'</a>";
                    } else {
                        print "<a href='lightsout.php?rij=" . $rij . "&kolom=" . $kolom . "'>"
                                . "<img src='lightsout-aan.png'</a>";
                    }
                }
                print '<br>';
            }
        }
        ?>
        <a href='lightsout.php?actie=reset'>Nieuw spel</a>



    </body>
</html>
