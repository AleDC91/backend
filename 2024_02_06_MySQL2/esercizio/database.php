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


$sql = "CREATE DATABASE IF NOT EXISTS esercizioMySQL";

if (!$mysqli->query($sql)) {
    die("Error creating database: " . $mysqli->error);
}


$sql = "USE esercizioMySQL";

if (!$mysqli->query($sql)) {
    die("Error: " . $mysqli->error);
}

$sqlTable = "CREATE TABLE IF NOT EXISTS users (
 `id` INT NOT NULL AUTO_INCREMENT , 
 `first_name` VARCHAR(64) NOT NULL , 
 `last_name` VARCHAR(64) NOT NULL , 
 `email` VARCHAR(64) NOT NULL , 
 `password` VARCHAR(255) NOT NULL , 
 `newsletter` BOOLEAN NOT NULL , 
 `image_url` VARCHAR(255) NULL , 
 PRIMARY KEY (`id`), 
 UNIQUE (`email`))
";

if (!$mysqli->query($sqlTable)) {
    die("Errore nella creazione della tabella: " . $mysqli->error);
}


$sqlPostsTable = "CREATE TABLE IF NOT EXISTS posts (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT , 
    `post_title` VARCHAR(255) NOT NULL,
    `post_body` TEXT NOT NULL,
    `user_id` INT NOT NULL,
        CONSTRAINT `fk_users_posts`
        FOREIGN KEY (`user_id`)
        REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE)";
    


if (!$mysqli->query($sqlPostsTable)) {
    die("Errore nella creazione della tabella: " . $mysqli->error);
}


$dbEmailList = [];
$sqlEmail = "SELECT email FROM users";
$resEmail = $mysqli->query($sqlEmail);

if ($resEmail) {
    while ($row = $resEmail->fetch_assoc()) {
        $dbEmailList[] = $row["email"];
    }
}


$sqlAll = "SELECT * FROM users";

$allData = [];
$res = $mysqli->query($sqlAll);

if ($res) {
    while ($row = $res->fetch_assoc()) {
        $allData[] = $row;
    }
}
