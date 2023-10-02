<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $hoy = date("d");
    print_r($hoy . "<br>");
    $dia10 = 10;

    if ($hoy > $dia10) {
        echo "Sitio activo";
    } else {
        echo "Sitio no activo";
    }

    ?>
</body>

</html>