<?php
class Lotto{
  public function getNumbers(){
      $numbers = array();
      $iters=0;
      while($iters<6){
          $number = rand(1, 42);
          if(!in_array($number, $numbers)){
              array_push($numbers, $number);
              $iters++;
          }
      }
      return $numbers;
  }  
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php 
            $lotto = new Lotto();
            $numbers = $lotto->getNumbers();
            //$numbers=array(1, 15, 20, 22, 23, 40);
        ?>
    </head>
    <body>
        
        <table border="1">
        <?php
        for($i=0;$i<6;$i++){?>
            <tr>
                <?php
                for($j=1;$j<8;$j++){
                    $number = $j+$i*7;
                    ?>
                <td <?php
                    if(in_array($number, $numbers)){
                        print 'bgcolor="#888888"';
                    }?>
                
                > <?php print $number ?> </td>  
                <?php } ?>
            </tr>
        <?php } ?>
       
        </table>
    </body>
</html>
