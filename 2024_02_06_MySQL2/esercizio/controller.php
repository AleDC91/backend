<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("database.php");
require_once('functions.php');



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


unset($_SESSION["errorMsg"]);
unset($_SESSION["successMsg"]);
unset($_SESSION["edit_user"]);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register-form"])) {

        unset($_SESSION["userName"]);

        $target_dir = "uploads/";
        print_r($_FILES);
        if (!empty($_FILES['userAvatar']['name'])) {
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
                        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
                        exit();
                    }
                } else {
                    $_SESSION["errorMsg"] = "Formato file non valido";
                    header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
                    exit();
                }
            } else {
                $_SESSION["errorMsg"] = "Errore nel caricamento del file, dati non inseriti";
                header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
                exit();
            }
        }



        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $newsletter = isset($_POST['newsletter']) ? 1 : 0;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userAvatar = isset($imageURL) ? $imageURL : null;


        if (!strlen(trim(htmlspecialchars($_POST["firstName"]))) > 2) {
            $_SESSION["errorMsg"] = "First name <b> " . $firstName . " </b>troppo corto";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
            exit();
        } elseif (!strlen(trim(htmlspecialchars($_POST["lastName"]))) > 2) {
            $_SESSION["errorMsg"] = "Last name <b> " . $lastName . " </b>troppo corto";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
            exit();
        } elseif (strlen($password) < 8) {
            $_SESSION["errorMsg"] = "La password deve essere di almeno 8 caratteri";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
            exit();
        } elseif (in_array($email, $dbEmailList)) {
            $_SESSION["errorMsg"] = "Indirizzo email già presente nel database! 
                                     Inserisci una nuova email o fai il login";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
            exit();
        } else {
            $sql = "INSERT INTO users (first_name, last_name, email, password, newsletter, image_url) 
                    VALUES (?, ?, ?, ?, ?, ?);";

            $stmt = $mysqli->prepare($sql);
            if (!$stmt) {
                $_SESSION["errorMsg"] = "Errore durante la preparazione della query: " . $mysqli->error;
                header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
                exit();
            }

            $stmt->bind_param("ssssss", $firstName, $lastName, $email, $password, $newsletter, $imageURL);

            if (!$stmt->execute()) {
                $_SESSION["errorMsg"] = "Errore # " . $mysqli->errno . " " . "Errore! " . $mysqli->error;
                header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
                exit();
            } else {
                getIdFromEmail($mysqli, $email);
                $_SESSION["userID"] = getIdFromEmail($mysqli, $email);
                $_SESSION["successMsg"] = "Nuovo utente registrato sul database";
                $_SESSION["mailLoggedUser"] = $email;
                $_SESSION["userName"] = $firstName;
                $_SESSION["isLogged"] = true;
                $_SESSION["lastName"] = $lastName;
                $_SESSION["userImage"] = $imageURL;

                header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
                exit();
            }
        }
    }

    if (isset($_POST["delete-user"])) {
        $id = $_POST["id"];
        echo $id;
        $sql_select = "SELECT first_name FROM users WHERE id = ?";
        $stmt_select = $mysqli->prepare($sql_select);
        $stmt_select->bind_param("i", $id);
        if (!$stmt_select->execute()) {
            $_SESSION['errorMsg'] = "errore nella cancellazione dell'utente";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");
            exit();
        }

        $stmt_select->bind_result($deletedUser);
        $stmt_select->fetch();
        $stmt_select->close();



        $sql_delete = "DELETE FROM users WHERE id = ?";
        $stmt_delete = $mysqli->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id);
        if (!$stmt_delete->execute()) {
            $_SESSION['errorMsg'] = "errore nella cancellazione dell'utente";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");
            exit();
        } else {
            $_SESSION["successMsg"] = "Utente <b>" . $deletedUser . "</b> cancellato dal database";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");
            exit();
        }
    }

    if (isset($_POST['show-edit-user'])) {
        $id = $_POST["id"];
        echo $id;
        $sql_select = "SELECT * FROM users WHERE id = ?";
        $stmt_select = $mysqli->prepare($sql_select);
        $stmt_select->bind_param("i", $id);

        if (!$stmt_select->execute()) {
            $_SESSION['errorMsg'] = "Errore nella selezione dell'utente";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");
            exit();
        }

        $result = $stmt_select->get_result();
        $user = $result->fetch_assoc();

        $_SESSION["edit_user"]["edit_first_name"] = $user['first_name'];
        $_SESSION["edit_user"]["edit_last_name"] = $user['last_name'];
        $_SESSION["edit_user"]['edit_email'] = $user['email'];
        $_SESSION["edit_user"]["id"] = $id;

        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");

        $stmt_select->close();
    }

    if (isset($_POST['edit-user'])) {

        $newFirstName = $_POST['firstName'];
        $newLastName = $_POST['lastName'];
        $newEmail = $_POST['email'];
        $newId = $_POST['id'];


        $sql_edit = "UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
        $stmt_edit = $mysqli->prepare($sql_edit);
        $stmt_edit->bind_param("sssi", $newFirstName, $newLastName, $newEmail, $newId);
        if (!$stmt_edit->execute()) {
            $_SESSION['errorMsg'] = "errore nella modifica dei dati";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");
            exit();
        } else {
            $_SESSION["successMsg"] = "Dati utente modificati";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");
            exit();
        }
    }

    if (isset($_POST['register-page'])) {
        unset($_SESSION["successMsg"]);
        unset($_SESSION["errorMsg"]);
        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/register.php");
    }

    if (isset($_POST['logout'])) {

        unset($_SESSION["isLogged"]);

        unset($_SESSION["successMsg"]);
        unset($_SESSION["errorMsg"]);

        unset($_SESSION["userName"]);
        unset($_SESSION["lastName"]);
        unset($_SESSION["mailLoggedUser"]);
        unset($_SESSION["userImage"]);
        unset($_SESSION["userID"]);

        unset($_SESSION["user"]);

        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
        exit();
    }

    if (isset($_POST['login-page'])) {
        unset($_SESSION["successMsg"]);
        unset($_SESSION["errorMsg"]);
        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
    }

    if (isset($_POST['login'])) {
        unset($_SESSION["successMsg"]);
        unset($_SESSION["errorMsg"]);
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errorMsg"] = "Invalid email";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
            exit();
        }
        if (strlen($password) < 8) {
            $_SESSION["errorMsg"] = "Password deve essere di almeno 8 caratteri";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
            exit();
        }

        // echo $email;
        // echo "<hr>";
        // echo $password;
        // echo "<hr>";

        // print_r($allData);

        $loggedMatch = false;
        foreach ($allData as $user) {
            echo $user["password"];
            echo "<hr>";
            echo $password;
            if ($user["email"] == $email && password_verify($password, $user["password"])) {
                echo "<pre>";
                print_r($user);
                echo "</pre>";

                echo "<br>";
                $loggedMatch = true;
                $_SESSION["isLogged"] = true;
                $_SESSION["userName"] = $user["first_name"];
                $_SESSION["lastName"] = $user["last_name"];
                $_SESSION["userEmail"] = $user["email"];
                $_SESSION["userImage"] = $user["image_url"];
                $_SESSION["userID"] = $user["id"];
                break;
            }
        }
        if ($loggedMatch) {
            unset($_SESSION["errorMsg"]);
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
            exit();
        } else {
            $_SESSION["errorMsg"] = "Email o password errati";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
            exit();
        }
    }

    if (isset($_POST["newpost"])) {
        $postTitle = htmlspecialchars($_POST["postTitle"]);
        $postBody = htmlspecialchars($_POST["postBody"]);
        $userId = $_SESSION["userID"];



        if (strlen(trim(htmlspecialchars($_POST["postTitle"]))) < 5) {
            $_SESSION["errorMsg"] = "titolo troppo corto";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/newpost.php");
            exit();
        }
        if (strlen(trim(htmlspecialchars($_POST["postBody"]))) < 20) {
            $_SESSION["errorMsg"] = "post troppo corto";
            header("Location: http://localhost/2024_02_06_MySQL2/esercizio/newpost.php");
            exit();
        }

        savePost($mysqli, $postTitle, $postBody, $userId);

    }
}
