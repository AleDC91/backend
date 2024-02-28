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
                        <?php if($isLogged){ ?>
                        <a class="nav-link" href="http://localhost/2024_02_06_MySQL2/esercizio/allposts.php">All Posts</a>
                            <?php } ?>

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

                        <div class="btn-group dropstart me-5">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src=<?= isset($_SESSION["userImage"]) ? $_SESSION["userImage"] : "images/avatar-1577909_960_720.webp";  ?> alt="avatar" style="width: 50px; heigth: 50px">
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <a href="http://localhost/2024_02_06_MySQL2/esercizio/profile.php"><p class="ms-2"><b>My Profile</b></p></a>
                                </li>
                                <li class="dropdown-item">
                                    <p class="ms-2"><b><?php echo $_SESSION["userName"]; ?></b></p>
                                </li>
                                <li class="dropdown-item">
                                    <p class="ms-2"><b><?php echo $_SESSION["lastName"]; ?></b></p>
                                </li>
                                <li class="dropdown-item">
                                    <p class="ms-2"><b><?php echo $_SESSION["mailLoggedUser"]; ?></b></p>
                                </li>
                                <?php  if($currentPage == "newpost.php") {?>

                                    <li class="dropdown-item">
                                   <a href="http://localhost/2024_02_06_MySQL2/esercizio/index.php"> <p class="ms-2"><b>Home page</b></p></a>
                                </li>

                                    <?php } else {?>
                                <li class="dropdown-item">
                                   <a href="http://localhost/2024_02_06_MySQL2/esercizio/newpost.php"> <p class="ms-2"><b>NUOVO POST</b></p></a>
                                </li>
                                <?php } ?>
                                <li class="dropdown-item">
                                    <form method='post' action='controller.php'>
                                        <button class='btn btn-dark' name='logout'>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>





                    <?php } ?>



                </div>
            </div>
        </nav>
    </header>