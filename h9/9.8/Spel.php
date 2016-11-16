<?php

/**
 * Description of Spel
 *
 * @author steven.jespers
 */
class Spel {
    //put your code here
    private $spelbord=array();
    private $kolommen;
    private $rijen;
    

    public function __construct($rijen, $kolommen) {
        $this->kolommen = $kolommen;
        $this->rijen = $rijen;
        for($rij=0; $rij<$rijen;$rij++){
            for($kolom=0;$kolom<$kolommen;$kolom++){
                $this->spelbord[$rij][$kolom] = 0;
            }
        }
        
        $this->beginSpel();
    }
    
    private function beginSpel(){
        for($i=0;$i<1;$i++){
            $rij = rand(0, $this->getRijen()-1);
            $kolom = rand(0, $this->getKolommen()-1);
            $this->doeZet($rij,$kolom);
        }
    }
    
    public function doeZet($rij, $kolom){
        if($rij>0){
            $this->schakelOm($rij-1, $kolom);
        }
        if($rij < $this->rijen -1){
            $this->schakelOm($rij+1, $kolom);
        }
        if($kolom > 0){
            $this->schakelOm($rij, $kolom-1);
        }
        if($kolom < $this->kolommen-1){
            $this->schakelOm($rij, $kolom+1);
        }
        
        $this->schakelOm($rij, $kolom);
    }
    
    public function schakelOm($rij, $kolom){
        if($this->spelbord[$rij][$kolom] == 0){
            $this->spelbord[$rij][$kolom] = 1;
        }
        else if($this->spelbord[$rij][$kolom] == 1){
            $this->spelbord[$rij][$kolom] = 0;
        }
    }
    
    public function getKolommen(){
        return $this->kolommen;
    }
    
    public function getRijen(){
        return $this->rijen;
    }
    
    public function getValue($rij, $kolom){
        return $this->spelbord[$rij][$kolom];
    }
    
    public function checkWinst(){
        $aan = false;
        for($rij=0; $rij<$this->getRijen();$rij++){
            for($kolom=0;$kolom<$this->getKolommen();$kolom++){
                if($this->spelbord[$rij][$kolom] == 1){
                    $aan = true;
                }
            }
        }
        return !$aan;
    }
}
