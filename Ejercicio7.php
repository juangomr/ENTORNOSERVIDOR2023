<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
</head>
<body>
    <?php
    $a = 8;
    $b = 3;
    $c = 3;

    if($a == $b && $c > $b){
        echo "Correcto" . "<br>";

    }else{
        echo "Falso" . "<br>";
    }

    if($a == $b || $b == $c || $b <= $c){
        echo "Correcto" . "<br>";

    }else{
        echo "Falso" . "<br>";
    }

    
    ?>
</body>
</html>