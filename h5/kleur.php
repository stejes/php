<!DOCTYPE html>
<?php
    $achtergrondkleur = "white";
    if (isset($_POST["kleur"])) {
        setcookie("achtergrondkleur", $_POST["kleur"], time() + 24 * 3600);
        $achtergrondkleur = $_POST["kleur"];
    } elseif (isset($_COOKIE["achtergrondkleur"])) {
        $achtergrondkleur = $_COOKIE["achtergrondkleur"];
    }
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
        </head>
        <body style="background-color: <?php print($achtergrondkleur);?>">
            <?php
            // put your code here
            ?>

        <form action="kleur.php" method="post">
            Kies een achtergrondkleur: 
            <select id="kleur" name="kleur">
                <option value="blue">blauw</option>
                <option value="red">rood</option>
                <option value="green">groen</option>
                <option value="yellow">geel</option>
                <option value="white">wit</option>
            </select>
            <input type="submit" value="submit">
        </form>
        <a href="kleur.php">Pagina vernieuwen</a>
    </body>
</html>
