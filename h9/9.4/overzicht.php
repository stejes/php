<?php
//overzicht.php
require_once("Filmlijst.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        if (isset($_POST["titel"]) && is_numeric($_POST["duurtijd"]) && $_POST["duurtijd"] > 0) {
            $lijst = new FilmLijst();
            $lijst->insertFilm($_POST["titel"], $_POST["duurtijd"]);
        }
        ?>
    </head>
    <body>
        <h1>Alle films</h1>
        <ul>
            <?php
            $lijst = new FilmLijst();
            $films = $lijst->getLijst();
            foreach ($films as $film) {
                print '<li>';
                print $film->getTitel() . ' (' . $film->getDuurtijd() . ' min)' . ' (<a href="dbGegevensBewerken.php?id=' . $film->getId() . '">Bewerken</a>)'  . ' <a href="films.php?action=verwijder&id=' . $film->getId() . '"><img src="../delete.png"></a>';
                print '</li>';
            }
            ?>
        </ul>
        <h1>Film toevoegen</h1>
        <form action="overzicht.php" method="post">

            Titel: 
            <input type="text" name="titel">
            <br>
            Duurtijd: 
            <input type="text" name="duurtijd">
            <br>
            <input type="submit" value="Toevoegen">
        </form>
    </body>
</html>