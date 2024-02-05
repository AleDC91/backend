<?php

$obj = new stdClass();
$obj->name = 'Mario';
$obj->lastname = 'Rossi';
$obj->city = 'San Francisco';

$arr = ['name'=>'Mario', 'lastname'=>'Rossi', 'city'=>'San Francisco'];

$str = 'Mario Rossi';

// & tratta il parametro come riferimento e non come valore
function func(&$param) { 
    // $param->name = 'Jhon'; // Modifico il valore di  un oggetto
    $param['name'] = 'Jhon'; // Modifico il valore di  un array
    // $param = 'Jhon Rossi'; // Modifico il valore di  una stringa
    var_dump($param);
}

//func($obj); // Richiamo la funzione e come parametro gli passo un oggetto
//func($arr); // Richiamo la funzione e come parametro gli passo un array
//func($str); // Richiamo la funzione e come parametro gli passo una stringa
echo '<br/>';
//var_dump($obj);
//var_dump($arr);
//var_dump($str);

// Funzioni predefinite per String
// https://www.php.net/manual/en/ref.strings.php

$name = ' Mario Rossi ';
/* echo strtoupper($name);
echo strtolower($name);
echo strlen($name);
echo trim($name);
echo strpos($name, 'r');
print_r(explode(' ', $name));
echo join('', ['c','i','a','o']); */

// Funzioni predefinite per Array
// https://www.php.net/manual/en/ref.array.php

$arr = ['uno', 'due', 'tre'];
//$arr[] = 'nuovo';
array_push($arr, 'nuovo');
array_pop($arr);
array_shift($arr);
array_unshift($arr, 'primo');
array_splice($arr, 1); // Elimina un elemento dalla posizione 1 fino alla fine
array_splice($arr, 1, 2); // Elimina un elemento dalla posizione 1 fino alla posizione 2
array_splice($arr, 1, 1, 'altro'); // Elimina un elemento nella posizione 1 e lo sostituisce con un nuovo valore

count($arr); // la lunghezza di un array
sort($arr); // Ordina un array
array_search('tre', $arr); // Mi restituisce l'indice del valore 
array_reverse($arr);
array_walk($arr, fn(&$e) => $e = strtoupper($e)); // applica una callback ad ogni elemento del nostro array
$newArr = array_map(fn($e) => $e . '!!!', $arr); // applica una callback ad ogni elemento del nostro array e ritorna un nuovo array
$filterArr = array_filter($arr, fn($e) => strlen($e) > 3);// applica una callback ad ogni elemento del nostro array e ne restituisce un nuovo filtrato
$reduceVal = array_reduce($arr, fn($acc, $val) => $acc . '-' . $val);// applica una callback ad ogni elemento del nostro array e ritorna una solo valore

// Funzioni predefinite per Date
// https://www.php.net/manual/en/function.date.php


// Funzioni predefinite per Math
// https://www.php.net/manual/en/ref.math.php

$num1 = rand(1, 23);
$num2 = rand(1, 23);
$num3 = $num1 / $num2;
//echo '<p>'.$num3.'</p>';
//echo '<p>'.ceil($num3).'</p>';
//echo '<p>'.floor($num3).'</p>';
//echo '<p>'.round($num3).'</p>';
//echo '<p>'.abs($num3).'</p>';
?>

<?php

// Validazione dati con PHP

# filter_var(Sanitize) => funzione predefinita in PHP per la validazione dei dati
# Convalida e pulisce da codice HTML inviato una variabile
$str = '<h1>Ciao a tutti</h1>';
//$strSanitize = filter_var($str, FILTER_SANITIZE_STRING); // Deprecato
$strSanitize = htmlspecialchars($str); // Consigliata
//echo $strSanitize;


# filter_var(Validate) => funzione predefinita in PHP per la validazione dei dati
# Valida il tipo di valore di una variabile
#FILTER_VALIDATE_INT
#FILTER_VALIDATE_BOOLEAN
#FILTER_VALIDATE_IP
#FILTER_VALIDATE_DOMAIN
#FILTER_VALIDATE_EMAIL
#FILTER_VALIDATE_URL
#FILTER_VALIDATE_FLOAT

$num = 25;
if(filter_var($num, FILTER_VALIDATE_INT)) {
    echo "$num  è un valore intero <br/>";
} else {
    echo "$num  NON è una valore intero";
}

$email = 'example@example.com';
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "$email è un valore valido <br/>";
} else {
    echo "$email  NON è una valore valido";
}

$url = 'http://www.example.com';
if(filter_var($url, FILTER_VALIDATE_URL)) {
    echo "$url è un valore valido <br/>";
} else {
    echo "$url  NON è una valore valido";
}


// Inviare una mail tramite mail() funzione predefinita di PHP
// https://www.php.net/manual/en/function.mail.php

$to = 'example@example.com'; // indirizzo email del destinatario
$subject = 'Invio email di test'; // Oggetto della mail
$message = 'Questa è una mail inviata dal server'; // Corpo della mail
$additional_headers = 'From: no-reply@example.com, Reply-to: webmaster@example.com'; // Headers addizionali opzionali
$additional_params = ''; // Ulteriori parametri opzionali

mail($to, $subject, $message, $additional_headers);


// Inviare una mail con PHPMailer
// https://github.com/PHPMailer/PHPMailer
// composer require phpmailer/phpmailer


?>