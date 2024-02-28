<?php

function getIdFromEmail($mysqli, $email)
{
    $sql_select = "SELECT id FROM users WHERE email = ?";
    $stmt_select = $mysqli->prepare($sql_select);
    $stmt_select->bind_param("s", $email);
    if ($stmt_select->execute()) {
        $result = null;
        $stmt_select->bind_result($result);
        if ($stmt_select->fetch()) {

            $stmt_select->close();
            return $result;
        }
    }
}



function savePost($mysqli, $postTitle, $postBody, $authorId)
{
    $sql = "INSERT INTO posts (post_title, post_body, user_id) 
    VALUES (?, ?, ?);";

    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        $_SESSION["errorMsg"] = "Errore durante la preparazione della query: " . $mysqli->error;
        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/newpost.php");
        exit();
    }

    $stmt->bind_param("ssi", $postTitle, $postBody, $authorId);

    if (!$stmt->execute()) {
        $_SESSION["errorMsg"] = "Errore # " . $mysqli->errno . " " . "Errore! " . $mysqli->error;
        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/newpost.php");
        exit();
    } else {
        $_SESSION["successMsg"] = "Nuovo post aggiunto con successo!";


        header("Location: http://localhost/2024_02_06_MySQL2/esercizio/login.php");
        exit();
    }
}


function getAllUserPosts($mysqli, $userId) {
    $sql_posts = "SELECT id, post_title, post_body FROM posts WHERE user_id = ?";
    $stmt_posts = $mysqli->prepare($sql_posts);
    $stmt_posts->bind_param("i", $userId); // "i" per indicare che $userId è un intero
    if ($stmt_posts->execute()) {
        $result = array();
        $postId = null;
        $postTitle = null;
        $postBody = null;
        $stmt_posts->bind_result($postId, $postTitle, $postBody);
        while ($stmt_posts->fetch()) {
            $post = array(
                "id" => $postId,
                "post_title" => $postTitle,
                "post_body" => $postBody
            );
            $result[] = $post;
        }
        $stmt_posts->close();
        return $result;
    } else {
        return null; // Oppure gestire l'errore in modo appropriato
    }
}

function getAllPosts($mysqli) {
    $sql_posts = "SELECT id, post_title, post_body FROM posts";
    $stmt_posts = $mysqli->prepare($sql_posts);
    if ($stmt_posts->execute()) {
        $result = array();
        $postId = null;
        $postTitle = null;
        $postBody = null;
        $stmt_posts->bind_result($postId, $postTitle, $postBody);
        while ($stmt_posts->fetch()) {
            $post = array(
                "id" => $postId,
                "post_title" => $postTitle,
                "post_body" => $postBody
            );
            $result[] = $post;
        }
        $stmt_posts->close();
        return $result;
    } else {
        return null; // Oppure gestire l'errore in modo appropriato
    }
}