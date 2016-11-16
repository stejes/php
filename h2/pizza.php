<?php

$aantal = 2;
$gratisThuisbezorging = false;
$prijs = 6.5;
if ($aantal * $prijs > 10.0) {
    $gratisThuisbezorging = true;
}
if ($gratisThuisbezorging) {
    print("Uw pizza wordt gratis bezorgd.");
} else {
    print("Thuislevering kost 1 euro.");
}
?>
