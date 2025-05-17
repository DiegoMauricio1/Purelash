<?php
session_start(); // Starter sessionen for at tjekke om admin er logget ind

// Tjek om brugeren er logget ind, hvis ikke omdiriger til login-siden
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}