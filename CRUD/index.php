<?php include "./header.php" ?>
<div class="container">
    <div class="d-flex flex-wrap">
    <?php
        include "database.php";
        $pdo = Database::connect();
        
        foreach ($pdo->query("SELECT * FROM `List` ORDER BY name") as $list) {
            $req = $pdo->query("SELECT COUNT(*) FROM `Task` WHERE list_id = {$list['id']}");
            $total = $req->fetch();

            $req = $pdo->query("SELECT COUNT(*) FROM `Task` WHERE list_id = {$list['id']} AND completed = 1");
            $completedTasks = $req->fetch();
            ?>
            <div class="card m-3">
                <div class="card-body" style="background-color: <?= $list["color"] ?>;">
                    <a href="./read.php?id=<?= $list['id'] ?>"><h5 class="card-title"><?= $list["name"] ?></h5></a>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $completedTasks[0] ?> tâche(s) réalisée(s) sur <?= $total[0] ?></h6>
                </div>
                <ul class="list-group list-group-flush">
                    <?php
                        $req = $pdo->query("SELECT * FROM `Task` WHERE list_id={$list['id']} ORDER BY title");
                        $tasks = $req->fetchAll();
                        if (count($tasks) <= 0) {
                            echo "<p class='m-2'>Aucune tâche associée à cette liste.</p>";
                        }
                        foreach ($tasks as $task) { ?>
                            <li class='list-group-item'>
                                <input type="checkbox" <?= $task['completed'] ? 'checked' : '' ?> onchange="window.location.href='./updateStatus.php?id=<?= $task['id'] ?>'">
                                <?= $task['title'] ?>
                                <a href='./updateTask.php?id=<?= $task['id'] ?>'><i class='far fa-edit'></i></a>
                                <a href='./deleteTask.php?id=<?= $task['id'] ?>'><i class='text-danger far fa-trash'></i></a>
                            </li>
                        <?php } ?>
                    <li class='list-group-item'><center><a href="./createTask.php?id=<?= $list['id'] ?>"><i class="fas fa-plus-circle fa-2x"></i></a></center></li>
                </ul>
                <div class="card-body">
                    <a href="./update.php?id=<?= $list['id'] ?>" class="btn btn-warning"><i class="fas fa-pen"></i> Modifier</a>
                    <a href="./delete.php?id=<?= $list['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</a>
                </div>
            </div>
        <?php
        }
        Database::disconnect();
    ?>
    </div>
</div>
</body>
</html>