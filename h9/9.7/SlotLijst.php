<?php

require_once("Slot.php");

class SlotLijst {

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
        $sql = "select rijnummer, kolomnummer, status from vieropeenrij_spelbord";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $slot = new Slot($rij["rijnummer"], $rij["kolomnummer"], $rij["status"]);
            array_push($lijst, $slot);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getKolomLijst($kolomnummer) {
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $sql = "select rijnummer, kolomnummer, status from vieropeenrij_spelbord where kolomnummer = :kolom order by rijnummer asc";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':kolom' => $kolomnummer));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $slot = new Slot($rij["rijnummer"], $rij["kolomnummer"], $rij["status"]);
            array_push($lijst, $slot);
        }
        $dbh = null;
        return $lijst;
    }

    public function insertSlot($rijnummer, $kolomnummer, $status) {
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $sql = "insert into vieropeenrij_spelbord (rijnummer, kolomnummer, status) values (:rijnummer, :kolomnummer, :status)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':rijnummer' => $rijnummer, ':kolomnummer' => $kolomnummer, ':status' => $status));
        $dbh = null;
    }

    public function deleteSlot($id) {
        $sql = "delete from vieropeenrij_spelbord where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh = null;
    }

    public function getSlotById($id) {
        $sql = "select rijnummer, kolomnummer, status from vieropeenrij_spelbord where id = :id";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $slot = new Slot($id,  $rij["kolomnummer"], $rij["rijnummer"], $rij["status"]);
        $dbh = null;
        return $slot;
    }

    public function updateSlot($slot) {
        $sql = "update vieropeenrij_spelbord set status = :status where rijnummer= :rijnummer and kolomnummer = :kolomnummer";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $resultSet = $stmt->execute(array(':status' => $slot->getStatus(), ':rijnummer' => $slot->getRijnummer(), ':kolomnummer' => $slot->getKolomnummer()));            
        $dbh = null;
    }
    
    public function reset(){
        $sql = "update vieropeenrij_spelbord set status = 0";
         $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $stmt = $dbh->prepare($sql);
        $resultSet = $stmt->execute();            
        $dbh = null;
    }

}
