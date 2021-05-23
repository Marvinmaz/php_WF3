<?php
    include "header.php";
    include "navbar.php";
    include "database.php";
    session_start();
    if (key_exists("username", $_SESSION) && key_exists("id", $_SESSION)) {
        $pdo = Database::connect();
        $req = $pdo->query("SELECT post.id, name, path, content, username FROM `post` JOIN `image` ON id_image = image.id JOIN `user` ON id_user = user.id WHERE post.id = {$_GET['id']}");
        $post = $req->fetch();

        if ($_POST) {
            $content = $_POST["content"];
            if (strlen($content) > 5 && strlen($content) < 300) {
                $pdo->query("INSERT INTO `comment` (content, id_user, id_post) VALUES ('$content', {$_SESSION['id']}, {$post['id']})");
            } else {
                "<center class='text-danger'>Votre commentaire ne respecte le format.</center>";
            }
        }

        ?>
        <div class="mt-3 container d-flex flex-wrap">
            <div class="card m-3" style="width: 18rem;">
                <img src="<?= $post["path"] ?>" class="card-img-top" alt="<?= $post['name'] ?>">
                <div class="card-body">
                    <p class="card-text"><?= $post["content"] ?></p>
                    <footer class="blockquote-footer"><?= $post["username"] ?></footer>
                    <a href="./updatePost.php?id=<?= $post["id"] ?>" class="btn btn-warning"><i class="far fa-edit"></i> Modifier</a>
                    <a href="./deletePost.php?id=<?= $post["id"] ?>" class="btn btn-danger"><i class="far fa-trash"></i> Supprimer</a>
                </div>
            </div>
        </div>

        <div class="container">
            <h3>Commentaires</h3>
            <form method="post">
                <textarea name="content" id="content" class="form-control" placeholder="Votre commentaire..."></textarea>
                <input type="submit" value="+ Commenter" class="mt-3 btn btn-secondary">
            </form>

            <?php
                foreach ($pdo->query("SELECT * FROM `comment` WHERE id_post={$_GET['id']} ORDER BY id DESC LIMIT 8") as $comment) {
                    $req = $pdo->query("SELECT username FROM `user` WHERE id={$comment['id_user']}");
                    $author = $req->fetch();

                    $date = date_create($comment["created_at"]);
                    $createdAt = date_format($date, 'd/m/Y à H:i');
                    ?>
                    <div class="card mt-3">
                        <div class="card-header">
                            <b><?= $author["username"] ?></b>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <p><?= $comment["content"] ?></p>
                            <footer class="blockquote-footer"><?= $comment["created_at"] ? $createdAt : ''?></footer>
                            </blockquote>
                        </div>
                    </div>
                <?php } ?>
        </div>
<?php 
    } else { 
        echo "<script>window.location.href='disconnect.php'</script>";
    }

include "footer.php";

?>