<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('config.php');

$mysqli = new mysqli(
    $config["dbHost"],
    $config["dbUser"],
    $config["dbPass"]
);

if ($mysqli->connect_error) {
    die("Error connecting to database: " . $mysqli->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS esercizio4marzo";

if (!$mysqli->query($sql)) {
    die("Error creating database: " . $mysqli->error);
}


$sql = "USE esercizio4marzo";

if (!$mysqli->query($sql)) {
    die("Error: " . $mysqli->error);
}

$sqlTable = "CREATE TABLE IF NOT EXISTS material (  
 `id` INT(11) NOT NULL AUTO_INCREMENT,
 `title` VARCHAR(255) NOT NULL, 
 `author` VARCHAR(255) NOT NULL,
 `year` int(4) NOT NULL, 
 `type` VARCHAR(255) NOT NULL, 
 PRIMARY KEY (`id`))";

if (!$mysqli->query($sqlTable)) {
    die("Errore nella creazione della tabella: " . $mysqli->error);
}

