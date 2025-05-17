<?php
// Define the root directory path
$rootPath = dirname(__DIR__);

// Use absolute path to include the database class
require $rootPath . "/classes/classDB.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED & ~E_STRICT);


define("CONFIG_LIVE", "0"); // 0: Test enviroment || 1: Live enviroment

if(CONFIG_LIVE == 0){
    $DB_SERVER = "localhost";
    $DB_NAME = "purelash_booking";
    $DB_USER = "root";
    $DB_PASS = "";
}else{
    $DB_SERVER = "mysql11.unoeuro.com";
    $DB_NAME = "dmnz_dk_db";
    $DB_USER = "dmnz_dk";
    $DB_PASS = "";
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);