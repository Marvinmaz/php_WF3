<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise en pratique 2</title>
</head>
<body>
    <?php
        echo "Les nombres paires compris entre 0 et 10 : ";
        for ($i = 0; $i <= 10 ; $i++) { 
            if($i === 9) { 
                break; 
            }
            else if ($i % 2 === 0) { 
                echo $i; 
            } else { 
                echo ", "; 
            }
        }
    ?>
</body>
</html>