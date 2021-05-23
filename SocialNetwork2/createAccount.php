<?php
    include "header.php";
    include "database.php";
    if ($_POST) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        if ($password === $confirmPassword) {
            if (strlen($username) > 3 && strlen($username) < 80 && strlen($password) > 3 && strlen($password) < 80) {
                $pdo = Database::connect();
                $req = $pdo->prepare("SELECT id FROM `user` WHERE username=?");
                $req->execute([$username]);
                $user = $req->fetch();
                if($user) {
                    echo "<center class='text-danger'> Ce nom d'utilisateur existe déjà</center>";
                } else {
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $req = $pdo->prepare("INSERT INTO `user` (username, password) VALUES (:username, :password)");
                    $req->bindParam(":username", $username, PDO::PARAM_STR);
                    $req->bindParam(":password", $encryptedPassword, PDO::PARAM_STR);
                    $req->execute();

                    $req = $pdo->query("SELECT id FROM `user` WHERE username='{$username}'");
                    $user = $req->fetch();
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["id"] = $user["id"];
                    echo "<script>window.location.href='index.php'</script>";
                }
                Database::disconnect();
            } else {
                echo "<center class='text-danger'>Vos identifiants ne respectent pas le format.</center>";
            }
        } else {
            echo "<center class='text-danger'>Les deux mots de passe ne correspondent pas...</center>";
        }
    }

?>

<div class="container mt-3">
    <h3>Créer un compte utilisateur</h3>
    <form method="post">
        <label for="username" class="form-label">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="form-control">

        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">

        <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">

        <input type="submit" value="Créer mon compte" class="btn btn-primary mt-3">
    </form>
    <a href="./login.php">J'ai déjà un compte...</a>
</div>

<?php include "footer.php" ?>
