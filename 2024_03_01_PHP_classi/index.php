<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('Form.php');
require_once('header.php');
?>
<main class="container">
<?php 


use ADC\Form as Form;

$form = new Form('controller.php');

$form->addText('lastname');

$form->drawForm();






?>  
</main>
<?php
require_once('footer.php');
