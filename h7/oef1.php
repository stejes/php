<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div style="display: flex;flex-direction: column; align-items: center;">
            <?php
            // put your code here
            for ($i = 0; $i < 7; $i++) {
                ?>
                <span style="font-size:<?php print $i * 10 ?>px;">PHP is fantastsich</span>
            <?php }
            ?>

            <?php
            // put your code here
            for ($i = 6; $i > 0; $i--) {
                ?>
                <span style="font-size:<?php print $i * 10 ?>px;">PHP is fantastsich</span>
            <?php }
            ?>
        </div>
    </body>
</html>
