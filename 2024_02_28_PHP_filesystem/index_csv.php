<?php

$dir = 'filecsv/';
$file = 'users.csv';

$users = [
    ['Mario', 'Rossi', 'Roma'],
    ['Giuseppe', 'Verdi', 'Milano'],
    ['Franesca', 'Neri', 'Verona']
];


echo "<h1>Gestione file .csv</h1>";

if (!file_exists($dir)) {
    mkdir($dir, 0777);
}

$resource = fopen($dir . $file, 'w');
if ($resource) {
    foreach ($users as $user) {
        fputcsv($resource, $user, ';');
    }
    fclose($resource);
}
