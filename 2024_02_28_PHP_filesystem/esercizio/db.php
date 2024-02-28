<?php
require_once('config.php');

$mysqli = new mysqli(
    $config["dbHost"],
    $config["dbUser"],
    $config["dbPass"]
);

if ($mysqli->connect_error) {
    die("Error connecting to database: " . $mysqli->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS esercizio28febbraio";

if (!$mysqli->query($sql)) {
    die("Error creating database: " . $mysqli->error);
}


$sql = "USE esercizio28febbraio";

if (!$mysqli->query($sql)) {
    die("Error: " . $mysqli->error);
}

$sqlTable = "CREATE TABLE IF NOT EXISTS users (
 `id` INT NOT NULL AUTO_INCREMENT , 
 `first_name` VARCHAR(64) NOT NULL , 
 `last_name` VARCHAR(64) NOT NULL , 
 `city` VARCHAR(64) NOT NULL , 
 PRIMARY KEY (`id`))";

if (!$mysqli->query($sqlTable)) {
    die("Errore nella creazione della tabella: " . $mysqli->error);
}
