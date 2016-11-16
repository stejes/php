<?php
session_start();
require_once("BerichtenLijst.php");

if(!isset($_SESSION["nickname"])){
    $_SESSION["nickname"] = "p" . rand(111, 999);
}

if(isset($_POST["boodschap"]) && strlen($_POST["boodschap"])>0){
    $berichtenLijst = new BerichtenLijst();
    $berichtenLijst->insertBericht($_SESSION["nickname"], $_POST["boodschap"], date('Y-m-d H:i:s'));
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
        <h1>Berichten</h1>
        <?php
            $lijst = new BerichtenLijst();
            $berichten = $lijst->getLijst();
            foreach ($berichten as $bericht) {
                
                echo $bericht->getNickname() . "> " . $bericht->getBoodschap() . "<br>";
                
            }
            ?>
        
        
        <form action="chat.php" method="post">

            Bericht:
            <textarea rows="4" cols="50" name="boodschap"></textarea>
            <br>
            <input type="submit" value="Versturen">
        </form>
        
    </body>
</html>
