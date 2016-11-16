<?php

$start = 0;
$volgende = 1;
print $start . " ";
do{
    print $volgende . " ";
    $temp = $volgende;
    $volgende = $volgende + $start;
    $start = $temp;
}while($volgende < 5000);


?>
