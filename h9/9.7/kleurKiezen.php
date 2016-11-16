<?php
session_start();
require_once("SLotLijst.php");
if(isset($_GET["actie"]) && $_GET["actie"] == "reset"){
    if(isset($_SESSION["kleur"])){
        unset($_SESSION["kleur"]);
    }
    $lijst = new SlotLijst();
    $lijst->reset();
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
        <h1>Vier op een Rij</h1>
        <h2>Kies de kleur waar je mee wilt spelen</h2>
        <ul>
            <li><a href="spelen.php?kleur=2">Klik hier om met geel te spelen</a></li>
            <li><a href="spelen.php?kleur=1">Klik hier om met rood te spelen</a></li>
        </ul>
        <?php
        // put your code here
        ?>
    </body>
</html>
