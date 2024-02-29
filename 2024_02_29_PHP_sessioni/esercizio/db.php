<?php
require_once('config.php');

$mysqli = new mysqli(
    $config["dbHost"],
    $config["dbUser"],
    $config["dbPass"]
);

if ($mysqli->connect_error) {
    die("Error connecting to database: " . $mysqli->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS esercizio29febbraio";

if (!$mysqli->query($sql)) {
    die("Error creating database: " . $mysqli->error);
}


$sql = "USE esercizio29febbraio";

if (!$mysqli->query($sql)) {
    die("Error: " . $mysqli->error);
}

$sqlTable = "CREATE TABLE IF NOT EXISTS users (  
 `id` INT NOT NULL AUTO_INCREMENT, 
 `username` VARCHAR(255) NOT NULL,
 `email` VARCHAR(255) NOT NULL, 
 `password` VARCHAR(255) NOT NULL, 
 PRIMARY KEY (`id`), 
 UNIQUE (`email`))";

if (!$mysqli->query($sqlTable)) {
    die("Errore nella creazione della tabella: " . $mysqli->error);
}

$sqlTableLang = "CREATE TABLE IF NOT EXISTS lang (
    `id_lang` INT NOT NULL AUTO_INCREMENT,
    `en` TEXT NOT NULL,
    `it` TEXT NOT NULL,
    `fr` TEXT NOT NULL,
    `de` TEXT NOT NULL,
    PRIMARY KEY (`id_lang`))";

if(!$mysqli->query($sqlTableLang)){
    die("Errore nella creazione della tabella: " . $mysqli->error);
}

$fillLangTableSql = "INSERT INTO lang (en, it, fr, de) VALUES 
                    ('Welcome', 'Benvenuto', 'Bienvenue', 'Willkommen'),
                    ('Home Page', 'Pagina iniziale', 'Page d\'accueil', 'Startseite'),
                    ('Contacts', 'Contatti', 'Contacts', 'Kontakte'),
                    ('About', 'Su di Noi', 'À propos', 'Über'),
                    ('Title', 'Titolo', 'Titre', 'Titel'),
                    ('Author', 'Autore', 'Auteur', 'Autor'),
                    ('A Journey into Multilingualism', 'Un Viaggio nella Multilingua', 'Un Voyage dans le Multilinguisme', 'Eine Reise ins Mehrsprachige'),
                    ('Welcome to our multilingual website! We are delighted to offer you content in various languages to meet your linguistic needs. Our home page provides a comprehensive overview of our services and the latest updates. You can learn more about us in the \"About Us\" section, where we share our story and mission. If you have any questions or would like more information, feel free to contact us through our contacts. We will be happy to respond to your inquiries. Thank you for choosing us and happy browsing on our site!',
                    'Benvenuti nel nostro sito web multilingue! Siamo lieti di offrirvi contenuti in diverse lingue per soddisfare le vostre esigenze linguistiche. La nostra home page presenta una panoramica completa dei nostri servizi e delle ultime novità. Potete scoprire di più su di noi nella sezione \"Chi Siamo\", dove raccontiamo la nostra storia e la nostra missione. Se avete domande o desiderate maggiori informazioni, non esitate a contattarci tramite i nostri contatti. Saremo lieti di rispondere alle vostre richieste. Grazie per averci scelto e buona navigazione nel nostro sito!',
                    'Bienvenue sur notre site web multilingue ! Nous sommes ravis de vous proposer du contenu dans différentes langues pour répondre à vos besoins linguistiques. Notre page d\'accueil offre un aperçu complet de nos services et des dernières actualités. Vous pouvez en apprendre davantage sur nous dans la section \"À propos de nous\", où nous partageons notre histoire et notre mission. Si vous avez des questions ou souhaitez obtenir plus d\'informations, n\'hésitez pas à nous contacter via nos coordonnées. Nous serons heureux de répondre à vos demandes. Merci de nous avoir choisis et bonne navigation sur notre site!',
                    'Willkommen auf unserer mehrsprachigen Website! Wir freuen uns, Ihnen Inhalte in verschiedenen Sprachen anzubieten, um Ihren sprachlichen Bedürfnissen gerecht zu werden. Unsere Startseite bietet einen umfassenden Überblick über unsere Dienstleistungen und die neuesten Updates. Mehr über uns erfahren Sie im Abschnitt \"Über uns\", wo wir unsere Geschichte und unsere Mission teilen. Wenn Sie Fragen haben oder weitere Informationen wünschen, zögern Sie nicht, uns über unsere Kontakte zu kontaktieren. Wir werden gerne auf Ihre Anfragen antworten. Vielen Dank, dass Sie uns gewählt haben, und viel Spaß beim Surfen auf unserer Website!'
                    ),
                    ('Select language', 'Seleziona lingua', 'Sélectionner la langue', 'Sprache auswählen')
                    ";


$checkSql = 'SELECT * FROM lang';
$res = $mysqli->query($checkSql);
if($res->num_rows === 0){
    if(!$mysqli->query($fillLangTableSql)) { 
        echo($mysqli->connect_error); 
    } else { 
        echo 'Tabella lingue riempita!';}
}