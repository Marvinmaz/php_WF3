<?php


$identity = array(
    "Prénom" => "Chris",
    "Nom" => "Chevalier",
    "Adresse" => "30 rue Roquette",
    "Code postal" => "84000",
    "Ville" => "Avignon",
    "Email" => "chevalier@chris-freelance.com",
    "Téléphone" => "0657282392",
    "Date de naissance" => "1992-06-09"
);


echo "<ul>";
foreach ($identity as $key => $value) { 
    if ($key === "Date de naissance") { 
        $date = new DateTime($value); 
        $value = $date->format("d/m/Y"); 
    }
    echo "<li>$key : $value</li>"; 
}
echo "</ul>"; 

?>