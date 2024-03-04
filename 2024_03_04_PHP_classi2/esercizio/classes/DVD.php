<?php
require_once('interfaces/PrestitoInterface.php');
require_once('classes/MaterialeBibliotecario.php');
use biblioteca\MaterialeBibliotecario;

class DVD extends MaterialeBibliotecario {

    private static $countDVD = 0;
    
    function __construct($title, $author, $year){
        self::$countDVD++;
        parent::__construct($title, $author, $year);

    }
   
    public static function getCountDVD() {
        return self::$countDVD;
    }
    
    function presta() {
        self::$countDVD--;
        parent::$contatoreMateriale--;
    }

    function restituisci() {
        // implementa
    }

}