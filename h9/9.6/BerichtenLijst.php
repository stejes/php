<?php

require_once("Bericht.php");

class BerichtenLijst {

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
        $sql = "select id, nickname, boodschap, datum from chatberichten order by datum desc limit 20";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $bericht = new Bericht($rij["id"], $rij["boodschap"], $rij["nickname"], $rij["datum"]);
            array_push($lijst, $bericht);
        }
        $dbh = null;
        return $lijst;
    }

    public function insertBericht($nickname, $boodschap, $datum) {
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $sql = "insert into chatberichten (nickname, boodschap, datum) values (:nickname, :boodschap, :datum)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':nickname' => $nickname, ':boodschap' => $boodschap, ':datum' => $datum));
        $dbh = null;
    }

    public function deleteBericht($id) {
        $sql = "delete from chatberichten where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh = null;
    }

    public function getBerichtById($id) {
        $sql = "select nickname, boodschap from chatberichten where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $bericht = new Bericht($id,  $rij["boodschap"], $rij["nickname"], $rij["datum"]);
        $dbh = null;
        return $bericht;
    }

    public function updateBericht($bericht) {
        $sql = "update chatberichten set nickname = :nickname, boodschap = :boodschap where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $resultSet = $stmt->execute(array(
            ':nickname' => $bericht->getNickname(),
            ':boodschap' => $bericht->getBoodschap(),
            ':id' => $bericht->getId()));
        $dbh = null;
    }

}
