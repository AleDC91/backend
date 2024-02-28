<?php require_once('header.php'); ?>


<?php
session_start();

if (isset($_SESSION["errorMsg"])) { ?>
    <div class="alert alert-danger text-center mt-3 w-50 mx-auto" role="alert" id="msg-box">
        <?= $_SESSION["errorMsg"] ?>
    </div>
<?php }
if (isset($_SESSION["successMsg"])) { ?>
    <div class="alert alert-success text-center mt-3 w-50 mx-auto" role="alert" id="msg-box">
        <?= $_SESSION["successMsg"] ?>
    </div>
<?php }



session_write_close(); ?>


<main class="container my-5">
    <h1 class="mb-3">Inserisci qualche dato a casoooo</h1>

    <form action="controller.php" method="POST">
        <div class="mb-3">
            <label for="firstName" class="form-label">Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required="required">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Lastname</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required="required">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required="required">
        </div>
        <button name="userinfo" type="submit" class="btn btn-success">Salva</button>
    </form>

    <form action="controller.php" method="POST" class="my-5">
        <button name="generaCSV" type="submit" class="btn btn-primary">Genera CSV</button>
    </form>
</main>

<?php require_once('footer.php') ?>


<script>
    const msgBox = document.getElementById("msg-box");
    if (msgBox) {
        setTimeout(() => {
            msgBox.style.opacity = "0";
        }, 3000);
    }
</script>