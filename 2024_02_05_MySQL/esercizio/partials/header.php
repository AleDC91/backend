<?php
session_start();
$username = isset($_SESSION["userName"]) ? $_SESSION["userName"] : "guest";
$isLogged = isset($_SESSION["isLogged"]) && $_SESSION["isLogged"];
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
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

                    </div>
                    <p class="p-0 m-0 ms-5">Ciao <?= $username  ?> !</p>
                </div>
                <div>
                    <?php 
                    
                    if (!$isLogged && $currentPage == "login.php") { ?>
                        <form method='post' action='controller.php'>
                            <button class='btn btn-dark' name='register-page'>Register</button>
                        </form>
                    <?php } ?>

                    <?php 
                    
                    if (!$isLogged && $currentPage != "login.php") { ?>
                        <form method='post' action='controller.php'>
                            <button class='btn btn-dark' name='login-page'>Login</button>
                        </form>
                    <?php } ?>
                    <?php 
                    
                    if ($isLogged && $currentPage != "login.php") { ?>
                        <form method='post' action='controller.php'>
                            <button class='btn btn-dark' name='logout'>Logout</button>
                        </form>
                    <?php } ?>
                    

                   
                    </div>
                </div>
        </nav>
    </header>