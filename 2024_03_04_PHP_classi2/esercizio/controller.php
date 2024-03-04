<?php 

session_start();
unset($_SESSION["errorMsg"]);
unset($_SESSION["successMsg"]);


require_once('db.php');
require_once('functions/functions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['salva-materiale'])){

        $title = htmlspecialchars(trim($_POST['title']));
        $author = htmlspecialchars(trim($_POST['author']));
        $year = (int) trim($_POST['year']);

        if(strlen($title) === 0){
            $_SESSION["errorMsg"] = "Titolo Richiesto";
            header('Location: http://localhost/2024_03_04_PHP_classi2/esercizio/index.php');
            exit();
    }
        else if(strlen($author) === 0){
            $_SESSION["errorMsg"] = "Autore Richiesto";
            header('Location: http://localhost/2024_03_04_PHP_classi2/esercizio/index.php');
            exit();

        } else if (!filter_var($year, FILTER_VALIDATE_INT)){
            $_SESSION["errorMsg"] = "Anno non valido";
            header('Location: http://localhost/2024_03_04_PHP_classi2/esercizio/index.php');
            exit();
        }


        if($_POST['tipo'] === "DVD"){
            echo "stai salvando un DVD";
            salvaMateriale($mysqli, "DVD", $title, $author, $year);

        } else if($_POST['tipo'] === "libro") {
            echo "stai salvando un libro";
            salvaMateriale($mysqli, "libro", $title, $author, $year);


        }

    }
}