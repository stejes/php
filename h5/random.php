<?php
session_start();

class Random{
    public function genereer() {
        //if (!isset($_SESSION["randGetal"])) {
        if(isset ($_SESSION["counter"])){
            $_SESSION["counter"]+=1;
        }
        else{
            $_SESSION["counter"] = 1;
        }
        $counter = $_SESSION["counter"];
        if ($counter > 10) {
            unset($_SESSION["randGetal"]);
            unset($_SESSION["counter"]);
            $random = rand(1, 100);
            $_SESSION["randGetal"] = $random;
            
        }
        return $_SESSION["randGetal"];
    }

    

}
?>

<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $random = new Random();
        $getal = $random->genereer();
        print $getal;
        //print phpinfo();
        ?>
    </body>
</html>
