<?php
    include "./database.php";
    $db = Database::connect();
    $db->query("DELETE FROM `List` WHERE id={$_GET['id']}");
    Database::disconnect();
    header("Location: index.php");
?>