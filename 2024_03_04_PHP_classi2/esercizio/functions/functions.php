<?php
require_once('classes/DVD.php');
require_once('classes/Libro.php');



function salvaMateriale($mysqli, $type, $title, $author, $year){   
    if($type == "DVD"){
        $material = new DVD($title, $author, $year);
    } elseif($type == "libro"){
        $material = new Libro($title, $author, $year);
    }

    $sql = "INSERT INTO material (title, author, year, type) VALUES ('$title', '$author', '$year', '$type')";
    if (!$mysqli->query($sql)) {
        echo "Error $mysqli->error";
        $_SESSION["errorMsg"] = "Error: $mysqli->error";
        header('Location: http://localhost/2024_03_04_PHP_classi2/esercizio/index.php');
        exit();


    } else {
        $_SESSION["successMsg"] = "Nuovo " . $type . "inserito con successo!";
        header('Location: http://localhost/2024_03_04_PHP_classi2/esercizio/index.php');
        exit();

    }
}
