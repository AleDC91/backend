<?php
require_once('db.php');

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function getTranslations($language) {
    global $mysqli;
    
    $allowed_languages = array('en', 'fr', 'it', 'de');
    if (!in_array($language, $allowed_languages)) {
        throw new Exception("Errore: Lingua non valida.");
    }
    
    
    $query = "SELECT `id_lang`, `$language` FROM lang";
    
    $result = $mysqli->query($query);

    if (!$result) {
        echo 'erroroneee';
        throw new Exception("Errore nella query: " . $mysqli->error);
    }
    $translations = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $translations[$row['id_lang']] = $row[$language];
    }

    return $translations;
}

function loadTranslations($language) {
    session_start();
   
        $_SESSION['translations'] = getTranslations($language);

    session_write_close();
}



function setLanguageCookie($language) {
    setcookie('language', $language, time() + (86400 * 30)); 
    debug_to_console('Cookie per la lingua settato: ' . $language);
}

?>
