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
        <?php $grondtal = $_GET["grondtal"];?>
        <table border="1">
            <tr><td colspan="2">De tafel van <?php print $grondtal ?></td></tr>
            <?php
            for($i=1;$i<11;$i++){?>
            <tr>
                <td><?php print $i . " maal " . $grondtal?></td>
                <td><?php print $i*$grondtal?></td>
            </tr>
            <?php } ?>
        </table>
        <?php
        // put your code here
        ?>
        
    </body>
</html>
