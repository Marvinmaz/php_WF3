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
    <table class="table">
            <tr>
                <th>Titre</th>
                <th>Nom du réalisateur</th>
                <th>Année de production</th>
                <th>-</th>
            </tr>
    <?php
        
        include "./database.php";
        $pdo = Database::connect();

    
        foreach ($pdo->query("SELECT * FROM `movies`") as $movie) { ?>
            <tr>
                <td><?= $movie["title"] ?></td>
                <td><?= $movie["director"] ?></td>
                <td><?= $movie["year_of_prod"] ?></td>
                <td><a href="./read.php?id=<?= $movie['id'] ?>">Plus d'infos</a></td>
            </tr>
        <?php }
        Database::disconnect(); 
    ?>
    </table>
</body>
</html>