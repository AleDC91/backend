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


$allUserPosts = getAllUserPosts($mysqli, $_SESSION["userID"]);
?>
<main class="container">

<?php 

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


<form action="controller.php" method="POST" class="mt-5">

    <div class="mb-3">
        <label for="postTitle" class="form-label">Title</label>
        <input type="text" name="postTitle" class="form-control" id="postTitle">
    </div>
    <div class="mb-3">
        <label for="postBody" class="form-label">Body</label>
        <textarea  name="postBody" class="form-control" id="postBody"rows="10"></textarea>
    </div>
    <button class="btn btn-success" type="submit" name="newpost" >POST</button>

</form>


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