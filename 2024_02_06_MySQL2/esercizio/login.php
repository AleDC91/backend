<?php require_once('database.php') ?>

<?php require_once('partials/header.php'); ?>

<main class="container">

    <?php
    print_r($_SESSION["mailLoggedUser"]);
    $isLogged = false;

    session_start();
    if (isset($_SESSION["isLogged"])) {
        $isLogged = true;
        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/index.php");
    }

    if (isset($_SESSION["errorMsg"])) { ?>
        <div class="alert alert-danger text-center mt-3 w-50 mx-auto" role="alert" id="msg-box">
            <?= $_SESSION["errorMsg"] ?>
        </div>
    <?php } ?>
    <h1 class="text-center">Login</h1>

    <form action="controller.php" method="POST" class="mt-5">
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <button class="btn btn-success" type="submit" name="login">Login</button>
    </form>

</main>

<?php require_once('partials/footer.php'); ?>