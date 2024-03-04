<?php
require_once('interfaces/PrestitoInterface.php');
require_once('classes/MaterialeBibliotecario.php');
use biblioteca\MaterialeBibliotecario;

class Libro extends MaterialeBibliotecario {

    private static $countLibri = 0;
    
    function __construct($title, $author, $year){
        self::$countLibri++;
        parent::__construct($title, $author, $year);

    }
   
    public static function getCountLibri() {
        return self::$countLibri;
    }
    
    function presta() {
        
        self::$countLibri--;
        parent::$contatoreMateriale--;
    }

    function restituisci() {
        // implementa
    }

}