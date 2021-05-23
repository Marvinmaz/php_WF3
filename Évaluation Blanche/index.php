<?php

include "./header.php";
include "./database.php";
$pdo = Database::connect();

$req = $pdo->query("SELECT * FROM `advert` ORDER BY id DESC LIMIT 15");
$adverts = $req->fetchAll(); 

echo '<div class="container">';
echo '<h3>Les annonces du moment</h3>';
echo '<div class="row">';

foreach ($adverts as $advert) { ?>
    <div class="card m-3" style="width: 18rem;">
        <img src="<?= $advert['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-uppercase"><?= $advert['title'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= "{$advert['postal_code']} {$advert['city']}" ?></h6>
            <p class="card-text"><?= $advert['description'] ?></p>
            <footer class="blockquote-footer"><?= $advert['type'] ?></footer>
        </div>
        <div class="card-footer text-muted">
            <b><?= $advert['price'] ?> €</b>
        </div>
    </div>
<?php
}
echo '</div></div>';
include "./footer.php" ?>