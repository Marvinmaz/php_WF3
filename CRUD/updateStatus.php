<?php

include "database.php";
$pdo = Database::connect();

$req = $pdo->query("SELECT completed FROM `Task` WHERE id={$_GET['id']}");
$task = $req->fetch();

$status = $task['completed'] ? 0 : 1;

$sql = "UPDATE `Task` SET completed = {$status} WHERE id={$_GET['id']}";
$pdo->query($sql);

Database::disconnect();
header("Location: index.php");