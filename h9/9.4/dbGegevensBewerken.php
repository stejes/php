<?php
require_once("Film.php");
require_once("Filmlijst.php");

$updated = false;
if (isset($_GET["action"]) && $_GET["action"] = "verwerk") {
    $film = new Film($_GET["id"],  $_POST["duurtijd"], $_POST["titel"]);
    $filmLijst = new Filmlijst();
    $filmLijst->updateFilm($film);
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
        $filmLijst = new Filmlijst();
        $film = $filmLijst->getFilmById($_GET["id"]);
        ?>
        <form action="dbGegevensBewerken.php?action=verwerk&id=<?php print($_GET["id"]); ?>" method="post">
            Titel: <input type="text" name="titel" value="<?php print($film->getTitel()); ?>" /><br /><br />
            Duurtijd: <input type="text" name="duurtijd" value="<?php print($film->getDuurtijd()); ?>" /> min<br />
            <input type="submit" value="Opslaan" />
        </form>
        <br />
        <a href="overzicht.php">Terug naar overzicht</a>
    </body>
</html>
