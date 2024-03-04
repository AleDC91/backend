<?php

use biblioteca\MaterialeBibliotecario;

require_once('db.php');
require_once('header.php');
?>
<main class="container"> 
    <?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('classes/Libro.php');
require_once('classes/DVD.php');
require_once('classes/Form.php');
?>
<?php 
session_start();

if (isset($_SESSION["successMsg"])) { ?>
    <div class="alert alert-success text-center mt-3 w-50 mx-auto" role="alert" id="msg-box">
        <?= $_SESSION["successMsg"] ?>
    </div>
<?php } 

if (isset($_SESSION["errorMsg"])) { ?>
    <div class="alert alert-danger text-center mt-3 w-50 mx-auto" role="alert" id="msg-box">
        <?= $_SESSION["errorMsg"] ?>
    </div>
<?php } ?>



<h1>Inserisci Libro</h1>
<?php 
$form = new ADC\Form("controller.php");
$form->setButtonName("Salva");
$form->setEmailFields([]);
$form->setPasswordFields([]);
$form->setTextFields(["title", "author", "year"]);
$form->setButtonId('salva-materiale');
$form->setRadioFields([
    "tipo" => [
        "libro",
        "DVD"
    ]
    ]);
$form->drawForm();

echo MaterialeBibliotecario::getContatoreMateriale(); 
echo "<br>";
echo Libro::getCountLibri();
echo "<br>";
echo DVD::getCountDVD();
?>


</main>
<script>
    const msgBox = document.getElementById("msg-box");
    if (msgBox) {
        setTimeout(() => {
            msgBox.style.opacity = "0";
        }, 3000);
    }
</script>
<?php 
require_once('footer.php');
session_write_close();



