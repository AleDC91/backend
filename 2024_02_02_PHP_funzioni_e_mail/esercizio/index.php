<?php

session_start();
$isLogged = false;
if ($_SESSION["isLogged"] == true) {
    $isLogged = true;
    $username = $_SESSION["usersList"][$_SESSION["userID"]]['firstName'];
}
if (!$isLogged) {
    header("Location: http://localhost/2024_02_02_PHP_funzioni_e_mail/esercizio/login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e registrazione</title>
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

                    </div>
                    <p class="p-0 m-0 ms-5">Ciao <?= $username ? $username : "guest" ?> !</p>
                </div>
                <div>
                    <?= $isLogged ?
                        "<form method='post' action='gestione.php'>
                            <button class='btn btn-dark' name='logout'>Logout</button>
                        </form>"

                        :
                        "<form method='post' action='gestione.php'>
                            <button class='btn btn-dark'>Login</button>
                        </form>" ?>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <h1 class="text-center mt-5">Pagina per utenti loggati</h1>


        <table class="table mx-5 mt-5">
        <thead>
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Subscribed</th>
        </thead>
        <?php
        if (isset($_SESSION["usersList"])) { ?>

            <tbody>
                <?php foreach ($_SESSION["usersList"] as $id => $user) { ?>
                    <tr class="vertical-align-middle">
                        <td class="vertical-align-middle">
                            <img style="width: 40px; height: 40px" class="img-fluid rounded-circle" src="<?= $user["userAvatar"] ?>" alt="<?= $user["firstName"] ?>">
                        </td>
                        <td class="vertical-align-middle"><?= $user["firstName"] ?></td>
                        <td class="vertical-align-middle"><?= $user["lastName"] ?></td>
                        <td class="vertical-align-middle"><?= $user["email"] ?></td>
                        <td class="vertical-align-middle"><?= $user["newsletter"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        <?php } ?>

    </table>
    </main>


    <footer class="container position-absolute bottom-0 p-5">
        &copy; Login&Registration
    </footer>
</body>

</html>