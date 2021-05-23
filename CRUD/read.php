<?php
    include "./header.php";
    include "database.php";
    $pdo = Database::connect();
    $req = $pdo->query("SELECT * FROM `List`");
    $list = $req->fetch();
?>

<div class="card m-3">
    <div class="card-body" style="background-color: <?= $list["color"] ?>;">
        <h5 class="card-title"><?= $list["name"] ?></h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
    <div class="card-body">
        <a href="./update.php?id=<?= $list['id'] ?>" class="btn btn-warning"><i class="fas fa-pen"></i> Modifier</a>
        <a href="./delete.php?id=<?= $list['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</a>
    </div>
</div>