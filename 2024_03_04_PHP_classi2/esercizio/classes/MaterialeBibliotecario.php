<?php 

namespace biblioteca;
require_once('interfaces/PrestitoInterface.php');

use PrestitoInterface;

 abstract class MaterialeBibliotecario implements PrestitoInterface{
     protected $title;
     protected $author;
     protected $year;

     protected static $contatoreMateriale = 0;

    
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;

        self::$contatoreMateriale++; 
        }

   

    public static function getContatoreMateriale() {
        return self::$contatoreMateriale;
    }
 }
