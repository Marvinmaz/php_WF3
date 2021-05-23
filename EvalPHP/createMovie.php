<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Movies 2000</title>
</head>
<body>

<?php
   
    include "./database.php";
    $pdo = Database::connect();

    if ($_POST) { 
        if (strlen($_POST['title']) > 5
        && strlen($_POST['actors']) > 5
        && strlen($_POST['director']) > 5
        && strlen($_POST['producer']) > 5
        && strlen($_POST['storyline']) > 5) { 

            $sql = "INSERT INTO `movies` (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES ('{$_POST["title"]}', '{$_POST["actors"]}', '{$_POST["director"]}', '{$_POST["producer"]}', '{$_POST["year_of_prod"]}', '{$_POST["language"]}', '{$_POST["category"]}', '{$_POST["storyline"]}', '{$_POST["video"]}')";
            $pdo->query($sql); 
            echo "<p style='color: green'>Le film a été enregistrée avec succès !</p>"; 
        } else {
            echo "<p style='color: red'>5 caractères au minimum</p>"; 
        }
    }

    Database::disconnect();
?>

    <form method="post">
        <label for="title">Titre</label>
        <input type="text" name="title" minlength="5">
        <label for="actors">Acteurs</label>
        <input type="text" name="actors" minlength="5">
        <label for="director">Directeur</label>
        <input type="text" name="director" minlength="5">
        <label for="producer">Produteur</label>
        <input type="text" name="producer" minlength="5">
        <label for="year_of_prod">Année de production</label>
        <select name="year_of_prod">
            <?php
                for ($i=1990; $i <= 2030; $i++) { 
                    echo "<option value='$i'>$i</option>";
                }
            ?>            
        </select>
        <label for="language">Langage</label>
        <select name="language">
            <option value='Français'>Français</option>
            <option value='Anglais'>Anglais</option>
            <option value='Autres'>Autres</option>
        </select>

        <label for="category">Catégorie</label>
        <select name="category">
            <option value='Aventure'>Aventure</option>
            <option value='Action'>Action</option>
            <option value='Comédie'>Comédie</option>
            <option value='Autres'>Autres</option>
        </select>

        <label for="storyline">Synopsis</label>
        <textarea name="storyline" minlength="5"></textarea>

        <label for="video">Lien vers la bande annonce</label>
        <input type="url" name="video">

        <input type="submit" value="Ajouter le film">
    </form>
</body>
</html>