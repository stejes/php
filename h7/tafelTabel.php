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
        
        <table border="1">
            
            <tr>
                <td></td>
                <?php
                for($j=1;$j<11;$j++){?>
                <td><?php print $j?></td>
                <?php } ?>
            </tr>
            <?php
            for($i=1;$i<11;$i++){?>
            <tr>
                <td><?php print $i?></td>
                <?php
                for($j=1;$j<11;$j++){?>
                <td><?php print $i*$j?></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
