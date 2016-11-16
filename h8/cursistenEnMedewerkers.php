<?php 
    class Persoon{
        private $familienaam;
        private $voornaam;
        public function __construct() {
            
        }
        
        public function setFamilienaam($naam){
            $this->familienaam = $naam;
        }
        
        public function setVoornaam($naam){
            $this->voornaam=$naam;
        }
        
        public function getFamilienaam(){
            return $this->familienaam;
        }
        
        public function getVoornaam(){
            return $this->voornaam;
        }
        
        public function getVollNaam(){
            return $this->getVoornaam() . " " . $this->getFamilienaam();
        }
    }
    
    class Cursist extends Persoon{
        private $aantalCursussen;
    }
    
    class Medewerker extends Persoon{
        private $aantalCursisten;
    }
?>


<?php
//cursistenEnMedewerkers.php
$cursist = new Cursist();
$medewerker = new Medewerker();
$cursist->setFamilienaam("Peeters");
$cursist->setVoornaam("Jan");
$medewerker->setFamilienaam("Janssens");
$medewerker->setVoornaam("Tom");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Cursisten en medewerkers</title>
    </head>
    <body>
        <h1>Namen</h1>
        <ul>
            <li><?php print($cursist->getVollNaam()); ?></li>
            <li><?php print($medewerker->getVollNaam()); ?></li>
        </ul>
    </body>
</html>