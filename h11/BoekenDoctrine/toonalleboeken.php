<?php

//toonalleboeken.php
//require_once("business/BoekService.php");
use VDAB\MijnProject\Business\BoekService;

//use Doctrine\Common\ClassLoader;
require_once 'bootstrap.php';
//require_once 'Libraries/Twig/Autoloader.php';



$boekSvc = new BoekService();
$boekenLijst = $boekSvc->getBoekenOverzicht();
//include("src/VDAB/MijnProject/Presentation/boekenlijst.php");

$view = $twig->render("boekenlijst.twig", array("boekenLijst" => $boekenLijst));
print($view);
