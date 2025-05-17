<?php
session_start(); // Starter sessionen for at kunne logge brugeren ud

$_SESSION = array(); // Fjerner alle gemte session-data (brugerens login-info)

session_destroy(); // Lukker sessionen helt

header("location: login.php"); // Sender brugeren tilbage til login-siden
exit;
