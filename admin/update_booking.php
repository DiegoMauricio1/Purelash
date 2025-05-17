<?php
session_start(); // Starter en session for at kunne tjekke om brugeren er logget ind
require "../settings/init.php"; // Forbinder til databasen

// Tjekker om brugeren er logget ind
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php"); // Sender brugeren til login-siden hvis ikke logget ind
    exit;
}

// Tjekker om formularen er blevet sendt
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hvis der ikke er et ID, sendes brugeren tilbage til dashboard
    if(empty($_POST["id"])) {
        header("location: dashboard.php");
        exit;
    }

    $id = $_POST["id"]; // ID på bookingen
    $status = $_POST["status"]; // Den nye status ('accepted' eller 'denied')

    // Kun disse to statusser er tilladt
    if($status != "accepted" && $status != "denied") {
        header("location: dashboard.php");
        exit;
    }

    // Opdaterer status for bookingen i databasen
    $sql = "UPDATE appointments SET status = :status WHERE id = :id";
    $binds = [
        ":status" => $status,
        ":id" => $id
    ];

    $result = $db->sql($sql, $binds, false);

    // Efter opdatering sendes brugeren tilbage til dashboard
    header("location: dashboard.php");
    exit;
} else {
    // Hvis det ikke er et POST request, sendes brugeren tilbage til dashboard
    header("location: dashboard.php");
    exit;
}
