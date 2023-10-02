<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio9</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>

<body>

    <?php
    echo "<table>
    <tr>
        <th>Ángulo</th>
        <th>Seno</th>
        <th>Coseno</th>
    </tr>";

    $incremento = 0.01;
    $num = 0;
    while ($num <= 2) {
        echo "<tr>";
        echo "<td>";
        echo $num;
        echo "</td>";
        $seno = sin($num);
        echo operacion($seno);
        echo "</td>";
        $coseno = cos($num);
        echo operacion($coseno);
        echo "</td>";
        echo "</tr>";
        $num += $incremento;
    }
    echo "</table>";
    function operacion($resultado)
    {
        if ($resultado < 0) {
            $color = "red";
        } else {
            $color = "blue";
        }
        echo "<td style=color:$color> $resultado";
    }
    ?>

</body>

</html>