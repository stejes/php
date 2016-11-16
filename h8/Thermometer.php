<?php

/**
 * Description of Thermometer
 *
 * @author manj
 */
class Thermometer {

    private $temperature;

    public function __construct($beginTemp) {

        $this->temperature = $beginTemp;
    }

    public function verhoog($aantalGraden) {
        
        $this->temperature += $aantalGraden;
        if($this->temperature > 100){
            $this->temperature = 100;
        }
    }

    public function verlaag($aantalGraden) {
        $this->temperature -= $aantalGraden;
         if($this->temperature < -50){
            $this->temperature = -50;
        }
    }
    
    public function getTemperature(){
        return $this->temperature;
    }

}
?>

<?php

    $thermometer = new Thermometer(25);
    $thermometer->verhoog(5);
    $thermometer->verlaag(4);
    print $thermometer->getTemperature();

