<?php

class testGetal {

    public function getPrintText($getal) {
        switch ($getal) {
            case 1:
                return "een";
                break;
            case 2:
                return "twee";
                break;
            case 3:
                return "drie";
                break;
            case 4:
                return "vier";
                break;
            case 5:
                return "vijf";
                break;
            default:
                return $getal;
        }
    }

}

$getal = 15;
$dinges = new testGetal();
print $dinges->getPrintText($getal)

?>
