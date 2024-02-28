<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

session_start();


unset($_SESSION["errorMsg"]);
unset($_SESSION["successMsg"]);






if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['userinfo'])) {

        print_r($_POST);
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $city = htmlspecialchars($_POST['city']);

        echo $firstName;
        echo $lastName;
        echo $city;


        if (strlen(trim($firstName)) < 2) {
            $_SESSION["errorMsg"] = "First name <b> " . $firstName . " </b>troppo corto";
            echo $_SESSION["errorMsg"];
            header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");
            exit();
        } elseif (strlen(trim($lastName)) < 2) {
            $_SESSION["errorMsg"] = "Last name <b> " . $lastName . " </b>troppo corto";
            echo $_SESSION["errorMsg"];

            header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");
            exit();
        } elseif (strlen(trim($city)) < 2) {
            $_SESSION["errorMsg"] = "Nome della città <b> " . $city . " </b>troppo corto";

            header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");
            exit();
        } else {

            $sql = "INSERT INTO users (first_name, last_name, city) 
            VALUES (?, ?, ?);";

            $stmt = $mysqli->prepare($sql);
            if (!$stmt) {
                $_SESSION["errorMsg"] = "Errore durante la preparazione della query: " . $mysqli->error;
                header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");
                exit();
            }

            $stmt->bind_param("sss", $firstName, $lastName, $city);

            if (!$stmt->execute()) {
                $_SESSION["errorMsg"] = "Errore # " . $mysqli->errno . " " . "Errore! " . $mysqli->error;
                header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");
                exit();
            } else {
                $_SESSION["successMsg"] = "Nuovo utente aggiunto al database";

                header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");
                exit();
            }
        }
    }

    if (isset($_POST['generaCSV'])) {
        $dir = 'files/';
        $nomeFile = 'users.csv';
        $file = __DIR__ ."/". $dir . $nomeFile;
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $sqlAll = "SELECT * FROM users";

        $allUsers = [];
        $res = $mysqli->query($sqlAll);

        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $allUsers[] = $row;
            }
        } else {
            $_SESSION["errorMsg"] = "errore nella raccolta dei dati dal DB";
            header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");

        }        
        $resource = fopen($file, "w");
        if ($resource) {
            foreach ($allUsers as $user) {
                fputcsv($resource, $user, ',');
                $_SESSION["successMsg"] = "file CSV generato con successo!";
                header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");

            }
        } else {
            $_SESSION["errorMsg"] = "errore nella scrittura del file csv";
            header("Location: http://localhost/2024_02_28_PHP_filesystem/esercizio/index.php");

        };
        fclose($resource);
    }
}
session_write_close();
