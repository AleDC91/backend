<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio form PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION["errorMsg"])) { ?>
        <div class="alert alert-danger text-center mt-3 w-50 mx-auto" role="alert">
            <?= $_SESSION["errorMsg"] ?>
        </div>
    <?php } ?>


    <h1 class="text-center mt-4">Lista utenti</h1>

    <form class="w-50 mx-auto" action="gestione.php" method="POST"  enctype="multipart/form-data">

        <div class="form-group mb-3">
            <label for="exampleInputEmail1">First Name</label>
            <input name="firstName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name...">
        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Last Name</label>
            <input name="lastName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter last name...">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email..">
        </div>

        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Image</label>
            <input name="userAvatar" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter an image...">
        </div>

        <div class="form-check mb-3">
            <input name="newsletter" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Iscriviti alla newsletter</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table mx-5">
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






</body>

</html>