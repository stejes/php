<?php
//dbGegevensBewerken.php
require_once("Module.php");
require_once("ModuleLijst.php");
$updated = false;
if (isset($_GET["action"]) && $_GET["action"] == "verwerk") {
    $module = new Module($_GET["id"], $_POST["naam"], $_POST["prijs"]);
    $modLijst = new ModuleLijst();
    $modLijst->updateModule($module);
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
        $modLijst = new ModuleLijst();
        $module = $modLijst->getModuleById($_GET["id"]);
        ?>
        <form action="dbGegevensBewerken.php?action=verwerk&id=
              <?php print($_GET["id"]); ?>" method="post">
            Naam: <input type="text" name="naam" value="<?php print($module->getNaam()); ?>" /><br /><br />
            Prijs: <input type="text" name="prijs" value="<?php print($module->getPrijs()); ?>" /> euro<br />
            <input type="submit" value="Opslaan" />
        </form>
        <br />
        <a href="overzicht.php">Terug naar overzicht</a>
    </body>
</html>