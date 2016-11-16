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
        // put your code here
        $random = rand(1, 10);
        $gok = $_GET["gok"];
        print "U gokte: " . $gok . "\n";
        print "Het getal was: " . $random . "\n";
        if($gok == $random){
            print "U gokte dus juist";
        }
        else{
            print "Verkeerd!";
        }
        ?>
    </body>
</html>
