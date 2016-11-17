<?php
session_start();
    
    if(!isset($_SESSION["admin"])){
        header("location: aanmelden.php");
        exit(0);
    }
    else{
        include("presentation/geheim.php");
    }
