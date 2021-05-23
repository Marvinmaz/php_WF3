<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session utilisateur</title>
</head>
<body>
    <?php
        session_start(); 
        if($_POST) { 
            setcookie("age", $_POST['age'], time() + (86400 * 2)); 
            $_SESSION["firstName"] = $_POST['firstName']; 
            $_SESSION["lastName"] = $_POST['lastName'];
        }

        if(key_exists("firstName", $_SESSION) && key_exists("lastName", $_SESSION)) {  
            echo "Bienvenue {$_SESSION['firstName']} {$_SESSION['lastName']} !<br>"; 
            echo "<button><a href='./disconnect.php'>Se déconnecter</a></button><br>";
        } else { 
            ?>
            <p>Veuillez vous connecter</p>
            <form action="" method="POST">
                <label for="firstName">Prénom</label>
                <input type="text" name="firstName" placeholder="Votre prénom" required><br>
                <label for="lastName">Nom</label>
                <input type="text" name="lastName" placeholder="Votre nom" required><br>
                <label for="age">Âge</label>
                <input type="number" name="age" placeholder="Votre âge" required><br>
                <input type="submit" name="submit" value="Se connecter">
            </form>
    <?php } 
        if(key_exists("age", $_COOKIE)) { 
            echo "Vous avez {$_COOKIE['age']} ans.<br>"; 
        }
    ?>
</body>
</html>