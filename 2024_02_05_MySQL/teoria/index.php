<?php 
include('header.php');
require_once('config.php');
?>


<h1>Hello world</h1>



<?php
// var_dump($config);


$mysqli = new mysqli(
    $config["mySQL_host"],
    $config["mySQL_user"], 
    $config["mySQL_pass"], 
);

if($mysqli->connect_error){
    die($mysqli->connect_error);
} else {
    var_dump($mysqli);
}


$sql = "CREATE DATABASE IF NOT EXISTS miodb";



if(!$mysqli->query($sql)) {
    die($mysqli->error);
}

// vedi appunti umberto


?>




<?php include('footer.php') ?>