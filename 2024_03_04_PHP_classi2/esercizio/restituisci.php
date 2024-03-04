<?php

use ADC\Form;

require_once('header.php');
require_once('classes/Form.php');
?><main class="container">

    <?php

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


    <h1>Restituisci libro</h1>

    <?php

    $restituisciForm = new Form("controller.php");
    $restituisciForm->setButtonName("Restituisci");
    $restituisciForm->setButtonId('restituisci-libro');
    $restituisciForm->setEmailFields([]);
    $restituisciForm->setPasswordFields([]);
    $restituisciForm->setTextFields(['id']);
    $restituisciForm->drawForm();
    ?>
</main><?php
