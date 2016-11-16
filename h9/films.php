
<?php

class Film {

    private $titel;
    private $duurtijd;
    private $id;

    public function __construct($id, $duurtijd, $titel) {
        $this->id = $id;
        $this->duurtijd = $duurtijd;
        $this->titel = $titel;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitel() {
        return $this->titel;
    }

    public function getDuurtijd() {
        return $this->duurtijd;
    }

}

class FilmLijst {

    public function getLijst() {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");
//positionele params
        /* $sql = "select familienaam, voornaam from personen
          where familienaam = ? and geslacht = ? ";
          $stmt = $dbh->prepare($sql);
          $stmt->execute(array($familienaam, $geslacht));
          $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC); */
//benoemde params
        $sql = "select id, titel, duurtijd from films";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        /* foreach ($resultSet as $rij) {
          $text = $rij["titel"] . " (" . $rij["duurtijd"] . " min)";
          array_push($lijst, $text);
          } */
        foreach ($resultSet as $rij) {
            $film = new Film($rij["id"], $rij["duurtijd"], $rij["titel"]);
            array_push($lijst, $film);
        }
        $dbh = null;
        return $lijst;
    }

    public function insertFilm($titel, $duurtijd) {
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");
        $sql = "insert into films (titel, duurtijd) values (:titel, :duurtijd)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':titel' => $titel, ':duurtijd' => $duurtijd));
        $dbh = null;
    }

    public function deleteFilm($id) {
        $sql = "delete from films where id = :id";
        $dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", "cursusgebruiker", "cursuspwd");
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh = null;
    }

}

$filmLijst = new FilmLijst();
if (isset($_GET["action"]) && $_GET["action"] == "verwijder") {
    $filmLijst->deleteFilm($_GET["id"]);
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
                print $film->getTitel() . ' (' . $film->getDuurtijd() . ' min)' . ' <a href="films.php?action=verwijder&id=' . $film->getId() . '"><img src="./delete.png"></a>';
                print '</li>';
            }
            ?>
        </ul>
        <h1>Film toevoegen</h1>
        <form action="films.php" method="post">

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
