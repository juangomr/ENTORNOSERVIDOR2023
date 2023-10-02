<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Introduce un número</p>
    <form action="Ejercicio10.php" method="post">
        <label for="fname">Número: </label>
        <input type="text" id="fname" name="fname"><br>
        <input type="submit">
    </form>
    <?php
    $contador = 1;
    while ($contador <= $_POST['fname']) {

        echo "Los bucles while son fáciles";
        ++$contador;
        echo "<br>";
    }


    ?>
</body>

</html>