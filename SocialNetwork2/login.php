<?php

    include "header.php";
    include "database.php";
    if ($_POST) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (strlen($username) > 3 && strlen($username) < 80 && strlen($password) > 3 && strlen($password) < 80) {
            $pdo = Database::connect();
            $req = $pdo->prepare("SELECT * FROM `user` WHERE username = ?");
            $req->execute([$username]);
            $user = $req->fetch();
            if($user && password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $user["id"];
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "<center class='text-danger'>Vos identifiants sont incorrects.</center>";
            }
            Database::disconnect();
        } else {
            echo "<center class='text-danger'>Vos identifiants ne respectent pas le format.</center>";
        }
    }

?>

<div class="container mt-3">
    <h3>Se connecter</h3>
    <form method="post">
        <label for="username" class="form-label">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="form-control">

        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">

        <input type="submit" value="Se connecter" class="btn btn-primary mt-3">
    </form>
    <a href="./createAccount.php">Je n'ai pas encore de compte...</a>
</div>

<?php include "footer.php" ?>