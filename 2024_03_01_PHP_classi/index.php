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

    $form->setTextFields(['firstname', 'lastname']);

    $form->addText('user');

    $form->addEmail('email2');

    $form->setRadioFields(['colors' => ['red', 'green', 'blue']]);

    $form->addRadio(["musica" => ["rock", "punk", "metal", "blues"]]);

    $form->setButtonName('Invia i dati');

    $form->setSelectFields([
        "cibo" => [
            "carbonara", "pizza", "minestrina", "fiorentina"
        ]
    ]);
    $form->addSelect([
        "bibite" => [
            "birra", "coca cola", "vino", "benzina"
        ],
        "sport" => ["calcio", "tennis", "volley", "basket"]

    ]);

$form->generaFile();

    $form->drawForm();






    ?>
</main>
<?php
require_once('footer.php');
