<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db.php');
require_once('functions.php');
session_start();


unset($_SESSION["errorMsg"]);
unset($_SESSION["successMsg"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $pass = $_POST['password'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = $mysqli->query($sql);
        if ($row = $res->fetch_assoc()) {
            if ($pass === $row['password']) {
                echo 'pass ok';
                $_SESSION['userLogin'] = $row;
                session_write_close();
                // Verifico se durante il login è stata messa la spunto sulla checkbox Remember me
                if (isset($_REQUEST['remember'])) {
                    // Setting a cookie
                    setcookie("useremail", $row['email'], time() + 20 * 24 * 60 * 60);
                    setcookie("userpassword", $row['password'], time() + 20 * 24 * 60 * 60);
                }
                header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/index.php');
                exit;
            } else {
                $_SESSION['errorMsg'] = 'Password errata!!!';
                header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/login.php');
            }
        } else {
            $_SESSION['errorMsg'] = 'Email non trovata!!!';
            header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/login.php');
        }
    }
    if (isset($_POST['lang'])) {
        $lang = $_POST['lang'];
        echo $lang;
        header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/index.php?lang=' . $lang);
        exit();
    }
}

if (isset($_GET['email']) && isset($_GET['password'])) {

    $pass = $_GET['password'];
    $email = $_GET['email'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = $mysqli->query($sql);
    if ($row = $res->fetch_assoc()) {
        if ($pass === $row['password']) {
            echo 'pass ok';
            $_SESSION['userLogin'] = $row;
            session_write_close();
            // Verifico se durante il login è stata messa la spunto sulla checkbox Remember me
            if (isset($_REQUEST['remember'])) {
                // Setting a cookie
                setcookie("useremail", $row['email'], time() + 20 * 24 * 60 * 60);
                setcookie("userpassword", $row['password'], time() + 20 * 24 * 60 * 60);
            }
            header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/index.php');
            exit;
        } else {
            $_SESSION['errorMsg'] = 'Password errata!!!';
            header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/login.php');
        }
    } else {
        $_SESSION['errorMsg'] = 'Email non trovata!!!';
        header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/login.php');
    }
}



if (isset($_POST['lang'])) {
    $lang = $_POST['lang'];
    echo $lang;
    header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/index.php?lang=' . $lang);
    exit();
}
