<?php require_once('partials/header.php'); ?>

<?php require_once('database.php'); ?>
<?php require_once('functions.php'); ?>

<?php

$isLogged = false;

if ($_SESSION["isLogged"] == true) {
    $isLogged = true;
    $username = $_SESSION["userName"];
}
if (!$isLogged) {
    header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
}

$allPosts = getAllPosts($mysqli);
?>
<main class="container">
    <h1 class="my-5 text-center"> Tutti i post</h1>
    <!-- <div class="profile-container mt-5 d-flex align-items-center">
        <div class="m-5">
            <img class="rounded-circle" src=<?php echo isset($_SESSION["userImage"]) ? $_SESSION["userImage"] : "images/avatar-1577909_960_720.webp" ?> alt="avatar" width="200px" height="200px" />
        </div>
        <div class="user-info">
            <h1>User: <?php echo $_SESSION["userName"] ?></h1>
            <h2>Email: <?php echo $_SESSION["mailLoggedUser"] ?></h2>
        </div>
    </div> -->

    <div class="user-posts-container">

        <?php foreach ($allPosts as $userPost) { ?>
            <div class="single-post">
                <h2> <?= $userPost["post_title"]  ?></h2>
                <p> <?= $userPost["post_title"]  ?></p>

            </div>
        <?php } ?>

    </div>




</main>


















<?php require_once('partials/footer.php'); ?>