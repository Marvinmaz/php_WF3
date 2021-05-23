<?php
    include "./header.php";
    include "database.php";
    if ($_POST) {
        $name = $_POST["name"];
        $color = $_POST["color"];
        if (strlen($name) > 3 && strlen($name) < 50 && strlen($color) > 6 && strlen($color) < 10) {
            $pdo = Database::connect();
            $sql = "INSERT INTO `list` (name, color) VALUES ('{$name}', '{$color}')";
            $pdo->query($sql);
            Database::disconnect();
            header("Location: index.php");
        } else {
            echo "<center><p class='text-danger'>Les données sont incorrects.</p></center>";
        }
    }
    ?>
    <div class="container" style="width: 50%;">
        <h3>Créer une liste</h3>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" minlength="3" maxlength="50" name="name" id="name" placeholder="Nom de la liste" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Couleur</label>
                <input type="color" class="form-control" name="color" minlength="6" maxlength="10" id="color" placeholder="Couleur de la liste" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Créer">
        </form>
    </div>
</body>
</html>