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

       
        $req = $pdo->query("SELECT * FROM `movies` WHERE id={$_GET['id']}");
        $movie = $req->fetch();

        Database::disconnect();
        if($movie) { 
    ?>

    <ul>
        <li><?= $movie["id"] ?></li>
        <li><?= $movie["title"] ?></li>
        <li><?= $movie["actors"] ?></li>
        <li><?= $movie["director"] ?></li>
        <li><?= $movie["producer"] ?></li>
        <li><?= $movie["year_of_prod"] ?></li>
        <li><?= $movie["language"] ?></li>
        <li><?= $movie["category"] ?></li>
        <li><?= $movie["storyline"] ?></li>
        <li><iframe width="560" height="315" src="<?= $movie['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
    </ul>
    <?php } else {
        echo "Désolé, votre film n'existe pas...";
    } ?>
</body>
</html>