<?php
include_once 'business/UserService.php';
session_start();
if(isset($_POST["gebruikersnaam"])){
    $userSvc = new UserService();
    $isValid = $userSvc->checkLogin($_POST["gebruikersnaam"], $_POST["wachtwoord"]);
    if($isValid){
        $_SESSION["admin"] = true;
        header("location: toongeheim.php");
        exit(0);
    }
}
include 'presentation/loginForm.php';

