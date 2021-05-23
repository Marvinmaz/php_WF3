<?php
    include "./database.php";
    $pdo = Database::connect();
    session_start();
    $idPost = $_GET["id"];
    $isLiked = $_GET["isLiked"];

    if (key_exists("username", $_SESSION) && key_exists("id", $_SESSION)) {
        /*$req = $pdo->query("SELECT * FROM `liked_post` WHERE id_user = {$_SESSION['id']} AND id_post = $idPost");
        $likedPost = $req->fetch();*/

        if($isLiked) {
            $pdo->query("DELETE FROM `liked_post` WHERE id_user = {$_SESSION['id']} AND id_post = $idPost");
        } else {
            $pdo->query("INSERT INTO `liked_post` (id_user, id_post) VALUES ({$_SESSION['id']}, $idPost)");
        }

        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>window.location.href='disconnect.php'</script>";
    }
?>