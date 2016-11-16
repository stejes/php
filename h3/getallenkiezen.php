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
    </head>
    <body>
        <?php
        //print $_GET["getal1"] + $_GET["getal2"];
        
        $bewerking = $_GET["bewerking"];
        $getal1 = $_GET["getal1"];
        $getal2 = $_GET["getal2"];
        switch($bewerking){
            case 1:
                print $getal1 + $getal2;
                break;
            case 2:
                print $getal1 - $getal2;
                break;
            case 3:
                print $getal1 * $getal2;
                break;
            case 4:
                print $getal1 / $getal2;
                break;
            default:
                print "verkeerde bewerking";
                break;
                
        }
        
        ?>
    </body>
</html>
