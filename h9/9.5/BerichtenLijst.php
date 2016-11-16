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
        $sql = "select id, auteur, boodschap, datum from gastenboek order by datum desc";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $bericht = new Bericht($rij["id"], $rij["boodschap"], $rij["auteur"], $rij["datum"]);
            array_push($lijst, $bericht);
        }
        $dbh = null;
        return $lijst;
    }

    public function insertBericht($auteur, $boodschap, $datum) {
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $sql = "insert into gastenboek (auteur, boodschap, datum) values (:auteur, :boodschap, :datum)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':auteur' => $auteur, ':boodschap' => $boodschap, ':datum' => $datum));
        $dbh = null;
    }

    public function deleteBericht($id) {
        $sql = "delete from gastenboek where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh = null;
    }

    public function getBerichtById($id) {
        $sql = "select auteur, boodschap from gastenboek where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $bericht = new Bericht($id,  $rij["boodschap"], $rij["auteur"], $rij["datum"]);
        $dbh = null;
        return $bericht;
    }

    public function updateBericht($bericht) {
        $sql = "update gastenboek set auteur = :auteur, boodschap = :boodschap where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $resultSet = $stmt->execute(array(
            ':auteur' => $bericht->getAuteur(),
            ':boodschap' => $bericht->getBoodschap(),
            ':id' => $bericht->getId()));
        $dbh = null;
    }

}
