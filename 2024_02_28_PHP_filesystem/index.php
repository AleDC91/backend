<?php

// mkdir crea una directory

$dir = 'file';
// mkdir($dir);

if (!file_exists($dir)) {
    mkdir($dir, 0777);
} else {
    // die("Failed to create directory");
}

# is_dir() --> verifica se il parametro passato è una cartella
#rmdir() --> cancella cartella;

$files = scandir($dir);

foreach ($files as $item) {
    if ($item === '.' || $item === '..') {
        continue;
    }
    if (is_dir($dir.$item)) {
        echo "$item è una directory.</br>";
    }
    if (!is_file($dir.$item)) {
        echo "$item  è un file.</br>";
    }
}

// var_dump($files);


# fopen() --> apre un file o un URL
# fread() --> legge un file , gli serve un secondo parametro per a modalità. r, w, a, r+, w+, a+, c, c+, e
# filesize() --> dimensioni del file
# fclose() --> chiude un file aperto

$dir = 'file/';
$file = 'ciao.txt';




// SCITTURA DI UN FILE

$resource = fopen($dir.$file, 'w');
if($resource){
    fwrite($resource, 'testo che sostituisce quello precedente');
fclose($resource);
}
else {
    echo "errore";
}

$resource = fopen($dir.$file, 'a');
if($resource){
    fwrite($resource, 'testo che si appende quello precedente');
fclose($resource);
}
else {
    echo "errore";
}

// LETTURA DI UN FILE
$resource = fopen($dir.$file, 'r');
if($resource){
    $txt = fread($resource, filesize($dir.$file,));
    echo $txt;
    fclose($resource);
}