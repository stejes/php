<?php
require_once("Bericht.php");
require_once("Berichtenlijst.php");

$updated = false;
if (isset($_GET["action"]) && $_GET["action"] = "verwerk") {
    $bericht = new Bericht($_GET["id"],  $_POST["boodschap"], $_POST["auteur"]);
    $berichtLijst = new Berichtenlijst();
    $berichtLijst->updateBericht($bericht);
    $updated = true;
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Modules</title>
    </head>
    <body>
        <h1>Module bewerken</h1>
        <?php
        if ($updated) {
            print("Record bijgewerkt!");
        }
        $berichtLijst = new Berichtenlijst();
        $bericht = $berichtLijst->getBerichtById($_GET["id"]);
        ?>
        <form action="dbGegevensBewerken.php?action=verwerk&id=<?php print($_GET["id"]); ?>" method="post">
            Auteur: <input type="text" name="auteur" value="<?php print($bericht->getAuteur()); ?>" /><br /><br />
            Boodschap: <input type="text" name="boodschap" value="<?php print($bericht->getBoodschap()); ?>" /> min<br />
            <input type="submit" value="Opslaan" />
        </form>
        <br />
        <a href="overzicht.php">Terug naar overzicht</a>
    </body>
</html>
