<?php 
echo "ciaone"; 

$var = "Mario";
echo $var;

echo "<h2>$var</h2>";
echo "<h1>Rossi</h1>";
?>

<?= "versione corta di echo"?>

<?php 
$bool = true;
var_dump($bool);
$numInt = 5;
var_dump($numInt);
$numFloat = 2.3;
var_dump($numFloat);
$varStr = "stringa";
var_dump($varStr);



define("C" , "costante define");
const CC = "costante const";


$arr = ["uno", "due", "tre"];
echo "<br>";
print_r($arr) ;
echo "<br>";

$arr[1] = "nuovo";
print_r($arr); // sostituzione valore all'indice indicato
echo "<br>";


$arr[10] = "con indice a caso";
print_r($arr); // agginge valore all'indice indicato
echo "<br>";

$arr[] = "altro";  // tipo push se array non ha indice
print_r($arr);
echo "<br>";

$arr["pippo"] = "ciao sono pippo e ho un indice tutto mio";
print_r($arr);
echo "<br>";
echo count($arr);


unset($arr[2]);  // rimuove elemento dell'array all'indice specificato
unset($arr);  // rimuove l'array 









?>