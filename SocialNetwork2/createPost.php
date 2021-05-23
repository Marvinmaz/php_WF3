<?php
    include "header.php";
    include "navbar.php";
    include "database.php";
    session_start();
    if (key_exists("username", $_SESSION) && key_exists("id", $_SESSION)) { 
        if ($_POST) {
            $content = $_POST["content"];
            $pdo = Database::connect();

            if ($_FILES["image"]["size"] < 2000000) {
                $fileName = $_FILES["image"]["name"];
                if(!is_dir("upload/")) {
                    mkdir("upload/");
                }

                $targetFile = "upload/{$fileName}";
                $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);

                if (in_array(strtolower($fileExtension), ["png", "jpg", "jpeg", "webp", "gif"])) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $req = $pdo->prepare("INSERT INTO `image` (name, path) VALUES (:name, :path)");
                        $req->bindParam(":name", $fileName, PDO::PARAM_STR);
                        $req->bindParam(":path", $targetFile, PDO::PARAM_STR);
                        $req->execute();

                        $req = $pdo->query("SELECT id FROM `image` ORDER BY id DESC LIMIT 1");
                        $image = $req->fetch();

                        $req = $pdo->prepare("INSERT INTO `post` (content, id_image, id_user) VALUES (:content, :id_image, :id_user)");
                        $req->bindParam(":content", $content, PDO::PARAM_STR);
                        $req->bindParam(":id_image", $image["id"], PDO::PARAM_INT);
                        $req->bindParam(":id_user", $_SESSION["id"], PDO::PARAM_INT);

                        $req->execute();

                        echo "<script>window.location.href='index.php'</script>";
                    }
                } else {
                    echo "<center class='text-danger'>Le fichier ne correspond pas au format image.</center>";
                }
            } else {
                echo "<center class='text-danger'>L'image est trop volumineuse.</center>";
            }
        }    
    } else { 
        echo "<script>window.location.href='disconnect.php'</script>";    
    }
?>

<div class="container mt-3">
    <h3>Publier</h3>
    <form method="post" enctype="multipart/form-data">
        <label for="content" class="form-label">Votre tweet</label>
        <textarea name="content" id="content" class="form-control" placeholder="Le contenu de votre tweet"></textarea>

        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image" class="form-control">

        <input type="submit" value="Publier" class="btn btn-primary mt-3">
    </form>
</div>

<?php include "footer.php" ?>