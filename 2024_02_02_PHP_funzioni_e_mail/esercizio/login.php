<?php
session_start();
// print_r($_SESSION);

$isLogged = false;

foreach ($_SESSION["usersList"] as $id => $user) {
    if ($id == $_SESSION["userID"]) {
        $isLogged = true;
        $_SESSION["isLogged"] = true;
        echo "Logged in ";
        header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/index.php");
    }
}




// echo $isLogged ? "true" : "false";

// print_r($_SESSION["usersList"]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Pricing</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </div>
                </div>
                <form action="gestione.php" method="POST" class="mt-5">
                    <button class='btn btn-dark' name="register">Register</button>
                </form>

            </div>
        </nav>
    </header>

    <main class="container">
        <h1 class="text-center mt-5">Login</h1>

        <?php
        if (isset($_SESSION["errorMsg"])) { ?>
            <div class="alert alert-danger text-center mt-3 w-50 mx-auto" role="alert">
                <?= $_SESSION["errorMsg"] ?>
            </div>
        <?php } ?>

        <form action="gestione.php" method="POST" class="mt-5">
            <input type="hidden" name="login">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button class="btn btn-success" type="submit">Login</button>
        </form>

    </main>

    <footer class="container position-sticky bottom-0 p-5">
        &copy; Login&Registration
    </footer>

</body>

</html>