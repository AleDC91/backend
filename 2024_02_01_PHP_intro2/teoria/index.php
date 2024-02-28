declare(strict_types=1);
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "weeeeeee";
    // commento a singola linea

    # commento a singola linea

    /*
    commento multilinea 
    */

    // operatori in php

    //    *, /, +, -, % 

    //  spaceship operator

    $x = 1;
    $y = 4;
    $z = 4;

    echo $x <=> $y;  // -1
    echo $z <=> $y;  // 0
    echo $z <=> $x;  // 1

    // operatore ternario

    // (condizione) ? se vero : se falso;

    // operatori unari
    //   ++ --

    // operatori logici
    // &&, ||, !, xor

    // concatenazione stringa
    // .=
    ?>

    <!-- posso chiudere e riaprire il tag php quando voglio -->

    <?php
    if ($x > $y) {
        echo "<h2>" . $x . " è maggiore di " . $y . "</h2>";
    } elseif ($x < $y) {
        echo "<h2>" . $y . " è maggiore di " . $x . "</h2>";
    } else {
        echo "<h2>" . $y . " è uguale a" . $x . "</h2>";
    }
    ?>


    <?php if ($x > $y) : ?>
        <h2><?= $x . " è maggiore di " . $y ?></h2>
    <?php elseif ($x < $y) : ?>
        <h2><?= $x . " è minore di " . $y ?></h2>
    <?php else : ?>
        <h2><?= $x . " è uguale a " . $y ?></h2>
    <?php endif; ?>



    <?php
    $expression = "cat";

    $result = match ($expression) {
        "dog" => "sono un cane",
        "cat" => "sono un gatto",
        default => "sono altro"
    };

    echo $result;
    ?>

    <?php
    $expression2 = 3;

    $result2 = match ($expression2) {
        1, 2, 3 => "basso",
        4, 5, 6 => "alto",
        default => "default"
    };

    echo $result2;
    ?>


    <?php
    // funzioni native di PHP

    # echo => stampa;
    # print => tipo echo ma ha valore di ritorno = 1 e si può usare in altri contesti particolari
    # print_r => stampa array. Accetta secondo parametro true o false, per far ritornare il valore di ritorno
    # var_dump => stampa il valore e il tipo di una variabile
    # isset => verifica se una variabile esiste e se non ha valore null
    echo +isset($ciao);  // trasformo in numero con + davanti, altrimenti la stringa vuota a video non si vede
    echo isset($result);

    # empty  => verifica se una variabile è vuota o meno 
    //   "", 0, -0, 0.0, null, false, [], variabile dichiarata ma non inizializzata

    # is_string() => verifica sel a variabile è di tipo stringa
    # is_numeric() => verifica se la variabile è di tipo numerico
    # is_int() => verifica se la variabile è di tipo intero
    # is_float()  => verifica se la variabile è di tipo float
    # is_bool()  => verifica se la variabile è di tipo bool
    # is_array() => verifica se la variabile è di tipo array
    # is_null()  => verifica se la variabile è null

    #gettype()  => restituisce il tipo di una variabile;


    function func()
    {
        echo func_num_args();
        print_r(func_get_args());
        echo func_get_arg(2);
    }
    func(12, 3, 4);
    ?>
    <?php



    echo "<br/>";
    echo func2(23, 4.3);  // hoisting per funzioni dichiarate normalmente. possi chiamare la funzione sopra la dichiarazione
    function func2(int $param1, float $param2)
    {
        return $param1 + $param2;
    }

    function func3(int $param1, float $param2)
    {
        return $param1 + $param2;
    }
    echo "<br/>";
    echo func3(param2: 12, param1: 3);
    echo "<br/>";


    $func7 = fn () => "CIAO CIAO ARROW FUNCTION";
    echo $func7();

    ?>

</body>

</html>