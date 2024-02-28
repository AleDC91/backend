<?php 

$host = "localhost";
$user = "utente";
$password = "tz5@T22TTD1bfYHP";
$dbname = "utente";

$dsn = "mysql:host=".$host.";dbname=".$dbname;
$pdo = new PDO($dsn, $user, $password);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$stmt = $pdo->query("SELECT * FROM prodotti WHERE id = 1");

while ($row = $stmt->fetch()) {
    echo $row->price;
}

// $name ="panino";
// $price = 4000;
// $marca = "Tezenis";

// $sql = "INSERT INTO prodotti (name, price, marca) VALUES(?,?,?)";

// $stmt  = $pdo->prepare($sql);
// $stmt->execute([$name, $price, $marca]);





?>