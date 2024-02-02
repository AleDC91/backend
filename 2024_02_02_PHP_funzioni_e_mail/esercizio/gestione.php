<?php


//Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
print_r($_POST);
unset($_SESSION["errorMsg"]);

// bottone register
if (isset($_POST['register'])) {
    unset($_POST['register']);
    header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
}


// gestione login

if (isset($_POST['login'])) {
    unset($_SESSION["errorMsg"]);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);;
    $password = $_POST['password'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errorMsg"] = "Invalid email";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/login.php");
        exit();
    }
    if (strlen($password) < 8) {
        $_SESSION["errorMsg"] = "Password deve essere di almeno 8 caratteri";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/login.php");
        exit();
    }

    foreach ($_SESSION["usersList"] as $id => $user) {
        if ($user["email"] == $email && $user["password"] == $password) {
            $_SESSION["isLogged"] = true;
            $_SESSION["userID"] = $id;
            unset($_SESSION["errorMsg"]);
            unset($_POST['login']);
            header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/");
        } else {
            $_SESSION["errorMsg"] = "email o password errati";
            header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/login.php");
            exit();
        }
    }
}













if (isset($_POST['logout'])) {
    unset($_SESSION["errorMsg"]);
    unset($_SESSION["userID"]);
    unset($_SESSION["isLogged"]);
    header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/login.php");
    exit();
}



if (isset($_POST['register-form'])) {

    if (!isset($_SESSION['usedEmails'])) {
        $_SESSION['usedEmails'] = [];
    }



    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $newsletter = isset($_POST['newsletter']) ? TRUE : FALSE;
    $password = $_POST['password'];
    $userAvatar = $_POST['userAvatar'];


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
                    header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
                    exit();
                }
            } else {
                $_SESSION["errorMsg"] = "Formato file non valido";
                header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
                exit();
            }
        } else {
            $_SESSION["errorMsg"] = "Errore nel caricamento del file, dati non inseriti";
            header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
            exit();
        }
    }

    if (isset($_SESSION['usersList'])) {
        $id = count($_SESSION['usersList']) + 1;
    } else {
        $id = 1;
    }



    if (in_array($email, $_SESSION["usedEmails"])) {
        $_SESSION["errorMsg"] = "Indirizzo email <b>$email</b> già esistente";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errorMsg"] = "Indirizzo email<b> " . $email . " </b>non valido";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
        exit();
    } elseif (strlen($firstName) < 3) {
        $_SESSION["errorMsg"] = "First name<b> " . $firstName . " </b>troppo corto";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
        exit();
    } elseif (strlen($lastName) < 3) {
        $_SESSION["errorMsg"] = "Last name<b>" . $lastName . " </b>troppo corto";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
        exit();
        // } elseif (!filter_var($newsletter, FILTER_VALIDATE_BOOL)) {
        //     $_SESSION["errorMsg"] = "Valore newsletter non valido";
        //     header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
        //     exit();
    } elseif (strlen($password) < 8) {
        $_SESSION["errorMsg"] = "La password deve essere di almeno 8 caratteri";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/register.php");
        exit();
    } else {
        $_SESSION["usersList"][$id]["userAvatar"] = $imageURL;
        $_SESSION["usersList"][$id]["firstName"] = $firstName;
        $_SESSION["usersList"][$id]["lastName"] = $lastName;
        $_SESSION["usersList"][$id]["email"] = $email;
        $_SESSION["usersList"][$id]["newsletter"] = $newsletter;
        $_SESSION["usersList"][$id]["password"] = $password;


        $_SESSION["usedEmails"][] = $email;

        $_SESSION["userID"] = $id;


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                   //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '3fbd567e8eeb43';                     //SMTP username
            $mail->Password   = '086e1e80adca38';                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 2525;


            // $phpmailer->isSMTP();
            // $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            // $phpmailer->SMTPAuth = true;
            // $phpmailer->Port = 2525;
            // $phpmailer->Username = '3fbd567e8eeb43';
            // $phpmailer->Password = '086e1e80adca38';//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($email, $firstName . " " .$lastName);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = "Grazie $firstName $lastName per esseri registrato!";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/login.php");
    }
}
