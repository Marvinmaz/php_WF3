<?php

include "./header.php";
include "./database.php";
$pdo = Database::connect();

$req = $pdo->query("SELECT * FROM `advert` WHERE id={$_GET['id']}");
$advert = $req->fetch();

if ($_POST) {
    $sql = "UPDATE `advert` SET reservation_message = '{$_POST['reservation_message']}' WHERE id = {$_GET['id']}";
    $pdo->query($sql);
    ?>
        <script>window.location.href='read.php?id=<?= $_GET['id'] ?>'</script>
    <?php
}
?>

<div class="container">
    <h3><?= $advert['title'] ?></h3>
    <div class="row">
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $advert['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted"><?= "{$advert['postal_code']} {$advert['city']}" ?></h6>
                <p class="card-text"><?= $advert['description'] ?></p>
                <footer class="blockquote-footer"><?= $advert['type'] ?></footer>
                <div class="card-footer text-muted">
                    <b><?= $advert['price'] ?> €</b>
                </div>
                <?php
                if($advert['reservation_message']) { ?>
                    <p class="card-text"><b>Message de réservation :</b><br><?= $advert['reservation_message'] ?></p>
                <?php } else { ?>
                    <form method="post">
                        <label for="reservation_message" class="form-label">Message de réservation</label>
                        <textarea name="reservation_message" id="reservation_message" class="form-control" placeholder="Votre message de réservation"></textarea>
                        <input type="submit" value="Envoyer" class="btn btn-primary mt-2">
                    </form>
                <?php } ?>
                
            </div>
            
        </div>
    </div>
</div>
<?php include "./footer.php" ?>