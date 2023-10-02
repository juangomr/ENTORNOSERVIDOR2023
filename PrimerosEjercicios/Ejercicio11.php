<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Ejercicio11.php" method="post">
        <label>A: </label>
        <input type="txt" name="A">
        <label>B: </label>
        <input type="txt" name="B"><br>
        <input type="submit" value="Suma" name="Suma">
        <input type="submit" value="Resta" name="Resta">
        <input type="submit" value="Multiplicacion" name="Multiplicacion">
        <input type="submit" value="Division" name="Division">
    </form>
    <?php
    $suma = isset($_POST['Suma']);
    $resta = isset($_POST['Resta']);
    $multiplicacion = isset($_POST['Multiplicacion']);
    $division = isset($_POST['Division']);
    if ($suma) { 
        echo "El resultado es: " . intval($_POST['A']) + intval($_POST['B']);
    } elseif ($resta) {
        echo "El resultado es: " . intval($_POST['A']) - intval($_POST['B']);
    } elseif ($multiplicacion) {
        echo "El resultado es: " . intval($_POST['A']) * intval($_POST['B']);
    } elseif ($division) {
        try {
            echo "El resultado es: " . intval($_POST['A']) / intval($_POST['B']);
        } catch (DivisionByZeroError $e) {
            echo "No se puede dividir entre cero";
        }
    }


    ?>
</body>

</html>