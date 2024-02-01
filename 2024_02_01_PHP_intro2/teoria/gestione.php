<?php 

echo"<h2>"."POST". "</h2>";
print_r($_POST);

echo "<h1>" . $_POST["firstName"] . " " . $_POST["lastName"] . "</h1>";

echo"<h2>"."SERVER". "</h2>";
print_r($_SERVER);

echo"<h2>"."REQUEST". "</h2>";
print_r($_REQUEST);

echo"<h2>"."FILES". "</h2>";
print_r($_FILES);


$file_name = $_FILES["mioFile"]["name"];
$file_type = $_FILES["mioFile"]["type"];
$file_size = $_FILES["mioFile"]["size"];
$file_tmp = $_FILES["mioFile"]["tmp_name"];
$file_err = $_FILES["mioFile"]["error"];

$target_dir = "uploads/";

if (!empty($_FILES["mioFile"]["name"])) {
    echo "<h2>" . $file_name . "</h2>";
    echo "<h2>" . $file_type . "</h2>";
    echo "<h2>" . $file_size . "</h2>";
    echo "<h2>" . $file_tmp . "</h2>";
    echo "<h2>" . $file_err . "</h2>";
    echo "<h2>" . $target_dir . $file_name . "</h2>";
    if ($file_err === 0) {
        
        if (move_uploaded_file($file_tmp, $target_dir . $file_name)) {
            echo "Caricamento avvenuto";
        } else {
            echo "NON caricato";
        }
    } else {
        echo "Errore durante il caricamento del file.";
    }
}

// altre funzioni

// is_uploaded_file()
// file_exists()
// unlink()
// getimagesize()
// basename()



echo"<h2>"."COOKIE". "</h2>";
print_r($_COOKIE);

echo"<h2>"."ENV". "</h2>";
print_r($_ENV);


# SESSIONI

session_start(); // inizialzza una sessione sul rbowser del client

$_SESSION["user"] = "Ale DC";   // posso accedere a questi dati anche in pagine diverse!!!


session_write_close();

echo"<h2>"."SESSION". "</h2>";
print_r($_SESSION["user"]);



#REDIRECT   

header("location: http://localhost/2024_02_01_PHP_intro2/teoria/index.php")

?>