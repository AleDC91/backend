<?php require_once('partials/header.php'); ?>
<main class="container">

    <h1 class="text-center mt-5">Register</h1>


    <?php
    session_start();

    if (isset($_SESSION["errorMsg"])) { ?>
        <div class="alert alert-danger text-center mt-3 w-50 mx-auto" role="alert">
            <?= $_SESSION["errorMsg"] ?>
        </div>
    <?php } ?>



    <form action="controller.php" method="POST" enctype="multipart/form-data" class="mt-5">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" name="firstName" class="form-control" id="firstName">
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" name="lastName" class="form-control" id="lastName">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="newsletter" class="form-check-input" id="newsletter">
            <label class="form-check-label" for="newsletter">Newsletter</label>
        </div>
        <div class="mb-3 form-check">
            <input type="file" name="userAvatar" id="userAvatar">
            <label for="userAvatar" class="form-label">Image</label>
        </div>
        <button type="submit" class="btn btn-primary mt-4" name="register-form">Submit</button>
    </form>





    <?php require_once('partials/footer.php'); ?>

</main>