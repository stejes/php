<?php
//overzicht.php
require_once("BerichtenLijst.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        if (isset($_POST["auteur"]) && isset($_POST["boodschap"])) {
            $auteur = $_POST["auteur"];
            $boodschap = $_POST["boodschap"];
            if (strlen($auteur) > 0 && strlen($boodschap) > 0 && strlen($boodschap) <= 200) {
                $lijst = new BerichtenLijst();
                $lijst->insertBericht($_POST["auteur"], $_POST["boodschap"], date('Y-m-d H:i:s'));
            }
            else{
                print "Beide velden moeten ingevuld zijn en boodschap max 200 karakters.";
            }
        }
        ?>
    </head>
    <body>
        <h1>Berichten</h1>
        <ul>
            <?php
            $lijst = new BerichtenLijst();
            $berichten = $lijst->getLijst();
            foreach ($berichten as $bericht) {
                print '<li>';
                print 'Auteur: ' . $bericht->getAuteur() . ' <br>' . $bericht->getBoodschap();
                print '</li>';
            }
            ?>
        </ul>
        <h1>Bericht toevoegen</h1>
        <form action="overzicht.php" method="post">

            Auteur: 
            <input type="text" name="auteur">
            <br>
            Boodschap: 
            <textarea rows="4" cols="50" name="boodschap"></textarea>
            <br>
            <input type="submit" value="Toevoegen">
        </form>
    </body>
</html>