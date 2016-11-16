<?php
//overzicht.php
require_once("ModuleLijst.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Modules</title>
    </head>
    <body>
        <h1>Modules</h1>
        <?php
        $modLijst = new ModuleLijst();
        $tab = $modLijst->getLijst();
        ?>
        <ul>
            <?php
            foreach ($tab as $module) {
                $moduleNaam = $module->getNaam();
                $moduleId = $module->getId();
                print("<li>" . $moduleNaam . "(<a href=\"dbGegevensBewerken.php?id="
                        . $moduleId . "\">Bewerken</a>) </li>");
            }
            ?>
        </ul>
    </body>
</html>