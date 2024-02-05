<?php require_once('partials/header.php'); ?>

<?php require_once('database.php'); ?>


<?php

$isLogged = false;

if ($_SESSION["isLogged"] == true) {
    $isLogged = true;
    $username = $_SESSION["userName"];
}
if (!$isLogged) {
    header("Location: http://localhost/2024_02_05_MySQL/esercizio/login.php");
}


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





<main class="container">
    <h1 class="text-center">Pagina per utenti loggati</h1>


    <table class="table mx-5 mt-5">
        <thead>
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Subscribed</th>
            <th>edit</th>
            <th>Delete</th>
        </thead>
        <?php
        if (isset($allData)) { ?>

            <tbody>
                <?php foreach ($allData as $user) { ?>
                    <tr class="vertical-align-middle">
                        <td class="vertical-align-middle">
                            <img style="width: 40px; height: 40px" class="img-fluid rounded-circle" src=<?php isset($user["image_url"]) ? print($user["image_url"]) : print("./images/avatar-1577909_960_720.webp") ?> alt="<?= $user["firstName"] ?>">
                        </td>
                        <td class="vertical-align-middle"><?= $user["first_name"] ?></td>
                        <td class="vertical-align-middle"><?= $user["last_name"] ?></td>
                        <td class="vertical-align-middle"><?= $user["email"] ?></td>
                        <td class="vertical-align-middle"><?= $user["newsletter"] ?></td>
                        <td>
                            <form action="controller.php" method="POST">
                                <input type="hidden" name="id" value=<?= $user["id"] ?>>
                                <button class="btn btn-warning" type="submit" name="show-edit-user" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="controller.php" method="POST">
                                <input type="hidden" name="id" value=<?= $user["id"] ?>>
                                <button class="btn btn-danger" type="submit" name="delete-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        <?php } ?>

    </table>



    <?php print_r($_SESSION["edit_user"])  ?>


    <?php if (isset($_SESSION["edit_user"])) { ?>
        <div class="edit-form text-center mx-auto w-50">
            <h2>EDIT DATA</h2>
            <form action="controller.php" method="POST" enctype="multipart/form-data" class="mt-5">
                <div class="mb-3">
                    <label for="firstName"  class="form-label">First Name</label>
                    <input type="text" value="<?= $_SESSION["edit_user"]["edit_first_name"]?>" name="firstName" class="form-control" id="firstName">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" value="<?= $_SESSION["edit_user"]["edit_last_name"]?>" name="lastName" class="form-control" id="lastName">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" value="<?= $_SESSION["edit_user"]["edit_email"]?>" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="id" value="<?= $_SESSION["edit_user"]["id"]?>">
                <button type="submit" class="btn btn-primary" name="edit-user">Modifica</button>
            </form>
        </div>
    <?php } ?>

</main>











<script>
    const msgBox = document.getElementById("msg-box");
    if (msgBox) {
        setTimeout(() => {
            msgBox.style.opacity = "0";
        }, 3000);
    }
</script>

<?php require_once('partials/footer.php'); ?>