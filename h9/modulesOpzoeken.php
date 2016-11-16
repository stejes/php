<?php
require_once("ModuleLijst.php");
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
        <h1>Zoekresultaat</h1>
        <ul>
            <?php
            // put your code here
            $lijst = new ModuleLijst();
            $text = array();
            $text = $lijst->getLijst($_GET["minimum"], $_GET["maximum"]);

            foreach ($text as $rij) {
                print '<li>' . $rij . '</li>';
            }
            ?>
        </ul>
    </body>
</html>
