<?php

//voegboektoe.php
/*require_once("business/GenreService.php");
require_once("business/BoekService.php");
require_once("exceptions/TitelBestaatException.php");*/
require_once 'bootstrap.php';
use VDAB\MijnProject\Business\GenreService;
use VDAB\MijnProject\Business\BoekService;
use VDAB\MijnProject\Exceptions\TitelBestaatException;
if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try{
    $boekSvc = new BoekService();
    $boekSvc->voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
    header("location: toonalleboeken.php");
    exit(0);
    } catch (TitelBestaatException $ex) {
        header("location: voegboektoe.php?error=titelbestaat");
        exit(0);
    }
} else {
    $genreSvc = new GenreService();
    $genreLijst = $genreSvc->getGenresOverzicht();
    if (isset($_GET["error"])){
        $error = $_GET["error"];
    }
    include("src/VDAB/MijnProject/Presentation/nieuwboekForm.php");
}