<?php

include "./header.php";
if ($_POST) {
    include "./database.php";
    $pdo = Database::connect();
    $sql = "INSERT INTO `advert` (title, description, postal_code, city, type, price, image) VALUES ('{$_POST['title']}', '{$_POST['description']}', '{$_POST['postal_code']}', '{$_POST['city']}', '{$_POST['type']}', {$_POST['price']}, '{$_POST['image']}')";
    $pdo->query($sql);
    Database::disconnect();
    ?>
    <script>window.location.href='index.php'</script>
    <?php
}

?>
    
<div class="container mt-2">
    <h3>Publier une annonce</h3>
    <form method="post">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Le titre de l'annonce">

        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="La description du bien"></textarea>

        <label for="postal_code" class="form-label">Code postal</label>
        <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Le code postal du bien">

        <label for="city" class="form-label">Ville</label>
        <input type="text" name="city" id="city" class="form-control" placeholder="La ville du bien">

        <label for="type" class="form-label">Type d'annonce</label>
        <select name="type" id="type" class="form-control">
            <option value="Vente">Vente</option>
            <option value="Location">Location</option>
        </select>

        <label for="price" class="form-label">Prix</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="Le prix du bien en €">

        <label for="image" class="form-label">Image du bien</label>
        <input type="text" name="image" id="image" class="form-control" placeholder="Le lien vers la photo du bien">

        <input type="submit" class="btn btn-primary mt-3" value="Publier l'annonce">
    </form>
</div>
<?php include "./footer.php" ?>