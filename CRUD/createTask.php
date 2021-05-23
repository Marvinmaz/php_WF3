<?php
    include "./header.php";
    include "database.php";
    if ($_POST) {
        $title = $_POST["title"];
        if (strlen($title) > 3 && strlen($title) < 50) {
            $pdo = Database::connect();
            $sql = "INSERT INTO `task` (title, completed, list_id) VALUES ('{$title}', 0, {$_GET['id']})";
            $pdo->query($sql);
            Database::disconnect();
            header("Location: index.php");
        } else {
            echo "<center><p class='text-danger'>Les données sont incorrects.</p></center>";
        }
    }
    ?>
    <div class="container" style="width: 50%;">
        <h3>Créer une tâche</h3>
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Nom</label>
                <input type="text" class="form-control" minlength="3" maxlength="50" name="title" id="title" placeholder="Nom de la tâche" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Créer">
        </form>
    </div>
</body>
</html>