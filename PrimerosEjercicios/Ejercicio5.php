<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>

<body>
    <?php
    $num1 = 5;
    $num2 = 6;
    $suma = $num1 + $num2;
    $resta = $num1 - $num2;
    $multiplicar = $num1 * $num2;
    $division = $num1 / $num2;
    $potencia = pow($num1, 2);
    echo "Suma: " . nl2br($suma . "\n");
    echo "Resta: " . nl2br($resta . "\n");
    echo "Multiplicación: " . nl2br($multiplicar . "\n");
    echo "División: " . nl2br($division . "\n");
    echo "Potencia: " . nl2br($potencia . "\n");



    ?>
</body>

</html>