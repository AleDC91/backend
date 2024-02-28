<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

unset($_SESSION["errorMsg"]);


if (!isset($_SESSION['usedEmails'])) {
    $_SESSION['usedEmails'] = [];
}


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$newsletter = $_POST['newsletter'];


$target_dir = "uploads/";
print_r($_FILES);
if (!empty($_FILES['userAvatar'])) {
    $userAvatar = $_FILES['userAvatar'];
    $file_tmp = $_FILES['userAvatar']['tmp_name'];
    $file_name = $_FILES['userAvatar']['name'];
    if ($userAvatar["error"] == 0) {
        if (
            $userAvatar["type"] == "image/jpeg" ||
            $userAvatar["type"] == "image/png" ||
            $userAvatar["type"] == "image/gif" ||
            $userAvatar["type"] == "image/webp"

        ) {

            if (move_uploaded_file($file_tmp, $target_dir . $file_name)) {
                $imageURL = $target_dir . $file_name;
            } else {
                $_SESSION["errorMsg"] = "Errore nello spostamento del file, dati non inseriti";
                header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
                exit();
            }
        } else {
            $_SESSION["errorMsg"] = "Formato file non valido";
            header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
            exit();
        }
    } else {
        $_SESSION["errorMsg"] = "Errore nel caricamento del file, dati non inseriti";
        header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
        exit();
    }
}


// print_r( $_SESSION);

if (isset($_SESSION['usersList'])) {
    $id = count($_SESSION['usersList']) + 1;
} else {
    $id = 1;
}

// echo $firstName . ' ' . $lastName . ' ' . $email . ' '  . $newsletter . ' '; 


if (in_array($email, $_SESSION["usedEmails"])) {
    $_SESSION["errorMsg"] = "Indirizzo email <b>$email</b> già esistente";
    header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errorMsg"] = "Indirizzo email<b> " . $email . " </b>non valido";
    header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
} elseif (strlen($firstName) < 3) {
    $_SESSION["errorMsg"] = "First name<b> " . $firstName . " </b>troppo corto";
    header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
} elseif (strlen($lastName) < 3) {
    $_SESSION["errorMsg"] = "Last name<b>" . $lastName . " </b>troppo corto";
    header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
} else {
    $_SESSION["usersList"][$id]["userAvatar"] = $imageURL;
    $_SESSION["usersList"][$id]["firstName"] = $firstName;
    $_SESSION["usersList"][$id]["lastName"] = $lastName;
    $_SESSION["usersList"][$id]["email"] = $email;
    $_SESSION["usersList"][$id]["newsletter"] = $newsletter;


    $_SESSION["usedEmails"][] = $email;
}



// $_SESSION["usersList"][$id]["userAvatar"] = $userAvatar;

print_r($_SESSION);

header("Location: http://localhost/2024_02_01_PHP_intro2/esercizio/");
