<?php

class Persoon {

    private $familienaam;
    private $voornaam;

    public function __construct($naam, $voornaam) {
        $this->familienaam = $naam;
        $this->voornaam = $voornaam;
    }

    public function setFamilienaam($naam) {
        $this->familienaam = $naam;
    }

    public function setVoornaam($naam) {
        $this->voornaam = $naam;
    }

    public function getFamilienaam() {
        return $this->familienaam;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function getVollNaam() {
        return $this->getVoornaam() . " " . $this->getFamilienaam();
    }

}

class Cursist extends Persoon {

    private $aantalCursussen;

    public function __construct($famNaam, $voornaam, $aantal) {
        parent::__construct($famNaam, $voornaam);
        $this->aantalCursussen = $aantal;
    }
    
    public function getAantalCursussen(){
        return $this->aantalCursussen;
    }

}

class Medewerker extends Persoon {

    private $aantalCursisten;

    public function __construct($famNaam, $voornaam, $aantal) {
        parent::__construct($famNaam, $voornaam);
        $this->aantalCursisten = $aantal;
    }
    
    public function getAantalCursisten(){
        return $this->aantalCursisten;
    }

}
?>


<?php
$cursist = new Cursist("Peeters", "Jan", 3);
$medewerker = new Medewerker("Janssens", "Tom", 8);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Cursisten en medewerkers</title>
    </head>
    <body>
        <h1>Namen</h1>
        <ul>
            <li><?php print($cursist->getVollNaam() . " volgt " . $cursist->getAantalCursussen() . " cursus(sen)");
?></li>
            <li><?php print($medewerker->getVollNaam() . " begeleidt " . $medewerker->getAantalCursisten() . " cursist(en)");?></li>
</ul>
</body>
</html>