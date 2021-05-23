<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_GET) { 
            if (strlen($_GET["firstName"]) > 2 && strlen($_GET["lastName"]) > 2 && strlen($_GET["age"]) > 1) {
                $gender = $_GET['gender'] == "other" ? "" : $_GET['gender'];
                echo "Bonjour {$gender} {$_GET['firstName']} {$_GET['lastName']} <br> Vous avez {$_GET['age']} ans";
            } else {
                echo "<p style='color:red'>Le format des données n'est pas respecté.</p>";
            }
        } else { ?>
            <form method="GET" class="container">
                <label for="gender">Genre</label>
                <select name="gender" class="form-control" id="gender">
                    <option value="M.">M.</option>
                    <option value="Mme">Mme</option>
                    <option value="other">Autre</option>
                </select>
                <label for="firstName">Prénom</label>
                <input type="text" class="form-control" name="firstName" minlength="2" id="firstName" required>
                <label for="lastName">Nom</label>
                <input type="text" class="form-control" name="lastName" id="lastName" required>
                <label for="age">Âge</label>
                <input type="number" class="form-control" name="age" min=18 max=120 id="age" required>
                <input type="submit" class="btn btn-primary mt-2">
            </form>
        <?php } ?>
</body>
</html>