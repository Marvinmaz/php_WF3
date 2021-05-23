<?php
    include "./database.php";
    $db = Database::connect();
    $db->query("DELETE FROM `Task` WHERE id={$_GET['id']}");
    Database::disconnect();
    header("Location: index.php");
?>