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
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required="required">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required="required">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Remember me
            </label>
        </div>
        <button name="login" type="submit" class="btn btn-success">Salva</button>
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