<?php
session_start();
require_once 'SlotLijst.php';
$lijst = new SlotLijst();



if(isset($_GET["kolomnummer"])){
    $kolomnummer = $_GET["kolomnummer"];
    
    $kolom = $lijst->getKolomLijst($kolomnummer);

    $steekRij = 0;
    for($i=1; $i<7; $i++){
        if($kolom[$i-1]->getStatus() == 0){
            $steekRij = $i;
        }
        else{
            break;            
        }
    }
    
    $status = $_SESSION["kleur"]%2+1;
    
    if($steekRij > 0){
        $slot = new Slot($steekRij, $kolomnummer, $status);
        $lijst->updateSlot($slot);
        $_SESSION["kleur"]++;
    }
}



if(isset($_GET["kleur"])){
    $kleur = $_GET["kleur"];
    $_SESSION["kleur"] = $kleur;
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Vier op een rij</h1>
        <?php
       
      //print $_SESSION["kleur"];
        $speelbord = $lijst->getLijst();
        
        
        
        for($row = 1; $row < 7; $row++){
            for($column = 1; $column < 8; $column++){
                $vak = $speelbord[$row*7-7+$column-1];
                
                if($vak->getStatus() == 0){
                    $img = 'emptyslot.png';
                }
                else if($vak->getStatus() == 1){
                    $img = 'yellowslot.png';
                }
                else if($vak->getStatus() == 2){
                    $img = 'redslot.png';
                }
                
                print "<a href='spelen.php?kolomnummer=" . $column . "'>"
                        . "<img src='" . $img . "'></a>";
            }
            print "<br>";
        }

        ?>
        <a href='kleurKiezen.php?actie=reset'>Reset het spel</a>
        
    </body>
</html>
