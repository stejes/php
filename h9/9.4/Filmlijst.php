<?php

require_once("Film.php");

class FilmLijst {

    private $dbConn;
    private $dbUsername;
    private $dbPassword;

    public function __construct() {
        $this->dbConn = "mysql:host=localhost;dbname=cursusphp;charset=utf8";
        $this->dbUsername = "cursusgebruiker";
        $this->dbPassword = "cursuspwd";
    }

    public function getLijst() {
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $sql = "select id, titel, duurtijd from films";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $film = new Film($rij["id"], $rij["duurtijd"], $rij["titel"]);
            array_push($lijst, $film);
        }
        $dbh = null;
        return $lijst;
    }

    public function insertFilm($titel, $duurtijd) {
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $sql = "insert into films (titel, duurtijd) values (:titel, :duurtijd)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':titel' => $titel, ':duurtijd' => $duurtijd));
        $dbh = null;
    }

    public function deleteFilm($id) {
        $sql = "delete from films where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh = null;
    }

    public function getFilmById($id) {
        $sql = "select titel, duurtijd from films where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $film = new Film($id,  $rij["duurtijd"], $rij["titel"]);
        $dbh = null;
        return $film;
    }

    public function updateFilm($film) {
        $sql = "update films set titel = :titel, duurtijd = :duurtijd where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $resultSet = $stmt->execute(array(
            ':titel' => $film->getTitel(),
            ':duurtijd' => $film->getDuurtijd(),
            ':id' => $film->getId()));
        $dbh = null;
    }

}
