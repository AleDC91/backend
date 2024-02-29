<?php 
// leggi e itera file xml, qui stampo solo nome ma puoi farci che vuoi
$dir = 'filexml/';
$file = "users.xml";

if(file_exists($dir.$file)){
    $xml = simplexml_load_file($dir.$file);
    print_r($xml);
} else {
    exit("Failed to open file");
}


// scrivi file xml

$user = [
    'name' => 'Antonio',
    'lastname' => 'Bianchi',
    'city' => 'Torino'
];

$xml = simplexml_load_file($dir.$file);
$userXml = $xml->addChild('user');
$userXml->addChild('name', $user['name']);
$userXml->addChild('lastname', $user['lastname']);
$userXml->addChild('city', $user['city']);


$file = fopen($dir.$file, 'w');
fwrite($file, $xml->asXML());
fclose($file);