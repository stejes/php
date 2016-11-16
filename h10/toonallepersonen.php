<?php

//toonallepersonen.php
require_once("business/PersoonService.php");
$pService = new PersoonService();
$personen = $pService->getPersonenOverzicht();
include("presentation/personenlijst.php");
