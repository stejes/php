<?php
session_start();

if(isset($_GET["reset"]) && $_GET["reset"]==1){
    unset($_SESSION["doors"]);
    unset($_SESSION["treasure"]);
    unset($_SESSION["finished"]);
    $_SESSION["tries"]=0;
}

if(!isset($_SESSION["doors"])){
    $_SESSION["doors"]=array(0, 0, 0, 0, 0, 0, 0);
    $_SESSION["treasure"] = rand(0, 6);
}

if(isset($_GET["door"])){
    $door = $_GET["door"];
    $_SESSION["tries"] += 1;
    if($door == $_SESSION["treasure"]){
        $_SESSION["doors"][$door] = 2;
        $_SESSION["finished"] = "Je hebt het geraden in " . $_SESSION["tries"] . " keer";
    }
    else{
        $_SESSION["doors"][$door] = 1;
    }
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
            .inactief {pointer-events: none;}
            
        </style>
    </head>
    <body>
        <h1>Kies een deur</h1>
        
        <?php
            for($i=0;$i<7;$i++){?>
        <a href="deuren.php?door=<?php print $i . " ";
        
                    if(isset($_SESSION["finished"])){
                        print "class='.inactief'";
                    }
                    else{
                        print '';
                    }
                 ?>">
            <img src="
                 <?php
                 $doors = $_SESSION["doors"];
                 if($doors[$i] == 0){
                     print "doorclosed.png";
                 }
                 else if($doors[$i] == 1){
                     print "dooropen.png";
                 }
                 else if($doors[$i] == 2){
                     print "doortreasure.png";
                 }
                 ?>
                 ">
        </a>
            <?php }
        
            if (isset($_SESSION["finished"])){
                print "<br>" . $_SESSION["finished"];
            }
            ?>
        <br>
        <a href="deuren.php?reset=1">Nieuw spel.</a>
         
    </body>
</html>
