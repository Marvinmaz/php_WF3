<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise en pratique</title>
</head>
<body>
    <?php
        $languages = ["HTML", "CSS", "PHP"]; 

 
        echo 'Voici vos ' . count($languages) .' langages informatiques préférés : ';
        foreach ($languages as $language) { 
            echo $language . " "; 
        }

     
        echo "<br>Parmi ces langages, le {$languages[1]} est votre favoris !<br>"; 

        $frameworks = ["HTML" => "WordPress", "CSS" => "Bootstrap", "PHP" => "Symfony"];

        foreach ($frameworks as $language => $framework) { 
            echo "Le framework <b>{$framework}</b> est écrit en {$language}<br>"; 
        }
    ?>
</body>
</html>