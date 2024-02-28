<?php 

$dir = 'filexml/';
$file = "users.xml";

if(file_exists($dir.$file)){
    $xml = simplexml_load_file($dir.$file);
    print_r($xml);
} else {
    exit("Failed to open file");
}


