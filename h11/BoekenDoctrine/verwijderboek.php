<?php

//verwijderboek.php
//require_once("business/BoekService.php");
use VDAB\MijnProject\Business\BoekService;
require_once 'bootstrap.php';
$boekSvc = new BoekService();
$boekSvc->verwijderBoek($_GET["id"]);
header("location: toonalleboeken.php");
exit(0);
