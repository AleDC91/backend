<?php
require_once('functions.php');

session_start();

if (!isset($_SESSION['userLogin']) && isset($_COOKIE["useremail"]) && isset($_COOKIE["userpassword"])) {
    header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/controller.php?email=' . $_COOKIE["useremail"] . '&password=' . $_COOKIE["userpassword"]);
} else if (!isset($_SESSION['userLogin'])) {
    header('Location: http://localhost/2024_02_29_PHP_sessioni/esercizio/login.php');
    exit(); 
}
require_once('header.php');




if (isset($_GET['lang'])) {
    $selectedLanguage = $_GET['lang'];
    setLanguageCookie($selectedLanguage);
    loadTranslations($selectedLanguage);
} else {
    if (isset($_COOKIE['language'])) {
        $selectedLanguage = $_COOKIE['language'];
        loadTranslations($selectedLanguage);
    } else {
        $selectedLanguage = 'en';
        setLanguageCookie($selectedLanguage);
        loadTranslations($selectedLanguage);
    }
}

$lang = $_SESSION['translations'];
?>


<main class="container">
    <div class="d-flex align-items-center justify-content-end">
        <p class="m-0 me-3 p-o "><?php echo $lang[9] ?></p>
        <form action="controller.php" method="POST" class="mx-1">
            <input type="hidden" name="lang" value="en">
            <button type="submit"><span class="fi fi-gb-eng fis"></span></button>
        </form>
        <form action="controller.php" method="POST" class="mx-1">
            <button type="submit"> <span class="fi fi-it fis"></span></button>
            <input type="hidden" name="lang" value="it">

        </form>
        <form action="controller.php" method="POST" class="mx-1">
            <input type="hidden" name="lang" value="fr">
            <button type="submit"> <span class="fi fi-fr fis"></span></button>
        </form>
        <form action="controller.php" method="POST" class="mx-1">
            <input type="hidden" name="lang" value="de">

            <button type="submit"><span class="fi fi-de fis"></span></button>
        </form>

    </div>

    <h1 class="mt-5"><?php echo $lang[7] ?></h1>
    <p><?php echo $lang[8] ?></p>
    <p><?php echo $lang[6] ?> : ChatGPT!!!</p>
</main>
<?php

require_once('footer.php');
session_write_close(); 
?>