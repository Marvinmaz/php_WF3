<?php
    include "./header.php";
    include "database.php";
    $pdo = Database::connect();
    $req = $pdo->query("SELECT * FROM `List` WHERE id={$_GET['id']}");
    $list = $req->fetch();
    
    if ($_POST) {
        $name = $_POST["name"];
        $color = $_POST["color"];
        if (strlen($name) > 3 && strlen($name) < 50 && strlen($color) > 6 && strlen($color) < 10) {
            $sql = "UPDATE `list` SET name='{$name}', color='{$color}' WHERE id={$_GET['id']}";
            $pdo->query($sql);
            Database::disconnect();
            header("Location: index.php");
        } else {
            echo "<center><p class='text-danger'>Les données sont incorrects.</p></center>";
        }
    }
    ?>
    <div class="container" style="width: 50%;">
        <h3>Modifier une liste</h3>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" value="<?= $list['name'] ?>" minlength="3" maxlength="50" name="name" id="name" placeholder="Nom de la liste" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Couleur</label>
                <input type="color" class="form-control" name="color" value="<?= $list['color'] ?>" minlength="6" maxlength="10" id="color" placeholder="Couleur de la liste" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Modifier">
        </form>
    </div>
</body>
</html>