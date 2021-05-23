<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>
<body>
    <?php
        
        function add(int $a, int $b): int {
            return $a + $b;  
        }

        
        function substract(int $a, int $b): int {
            return $a - $b; 
        }

      
        function multiply(int $a, int $b): int {
            return $a * $b; 
        }

      
        function divide(int $a, int $b): int {
            return $a / $b; 
        }

      
        function modulo(int $a, int $b): int {
            return $a % $b; 
        }


        function display(int $a, int $b, string $operation): void { 
            switch ($operation) { 
                case 'add': 
                    echo "L'addition de {$a} et {$b} donne <b>". add($a, $b) . "</b><br>";
                    break;
                case 'substract': 
                    echo "La soustraction de {$a} et {$b} donne <b>". substract($a, $b) . "</b><br>";
                    break;
                case 'multiply': 
                    echo "La multiplication de {$a} et {$b} donne <b>". multiply($a, $b) . "</b><br>";
                    break;
                case 'divide': 
                    echo "La division de {$a} et {$b} donne <b>". divide($a, $b) . "</b><br>";
                    break;
                case 'modulo': 
                    echo "Le modulo de {$a} et {$b} donne <b>". modulo($a, $b) . "</b><br>";
                    break;
                default: 
                    echo "Une erreur est survenue..." . "<br>";
                    break;
            }
        }
        

        display(2, 3, "add");
        display(6, 2, "substract");
        display(4, 3, "multiply");
        display(4, 2, "divide");
        display(4, 8, "modulo");
    ?>
</body>
</html>