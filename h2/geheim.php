<?php

//geheim.php
class Geheim {

    public function getResultaat() {
        /* $val = 22;
          $val = 50;
          $val = $val * 2;
          return $val; */
        $mijnGetal = 10;
        $mijnGetal = $mijnGetal * $mijnGetal; //ipv $mijngetal etc, wnat hoofdlettergevoelig
        return $mijnGetal;
    }

}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Geheim</title>
    </head>
    <body>
        <h1>
            <?php
            $geheim = new Geheim();
            print($geheim->getResultaat());
            ?>
        </h1>
    </body>
</html>