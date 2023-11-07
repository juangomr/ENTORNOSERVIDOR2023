<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar registros BBDD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/bbdd.css" rel="stylesheet">
</head>

<body>
    <h1>Eliminar registros</h1>
    <table>
        <tr class="primera-fila">
            <td>Id_Vivienda</td>
            <td>Tipo</td>
            <td>Zona</td>
            <td>Dirección</td>
            <td>Nº Dormitorios</td>
            <td>Precio</td>
            <td>Tamaño</td>
            <td>Extras</td>
            <td>Fotos</td>
            <td>Observaciones</td>
            <td>Eliminar</td>
        </tr>
        <?php
        include "conectarBBDD.php";
        $query = "SELECT * FROM viviendas";
        $resultado = mysqli_query($conn, $query);

        while ($fila = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td>
                    <?php echo $fila['id_vivienda'] ?>
                </td>
                <td>
                    <?php echo $fila['tipo'] ?>
                </td>
                <td>
                    <?php echo $fila['zona'] ?>
                </td>
                <td>
                    <?php echo $fila['direccion'] ?>
                </td>
                <td>
                    <?php echo $fila['num_dormitorios'] ?>
                </td>
                <td>
                    <?php echo $fila['precio'] ?>
                </td>
                <td>
                    <?php echo $fila['tamano'] ?>
                </td>
                <td>
                    <?php echo $fila['extras'] ?>
                </td>
                <td>
                    <?php echo $fila['foto'] ?>
                </td>
                <td>
                    <?php echo $fila['observaciones'] ?>
                </td>
                <td>
                    <input type="checkbox" name="check" id="check">
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <button type="submit" class="btn btn-outline-dark btn-lg">Eliminar registro</button>
    <button onclick="window.location.href='inicio.php'" class="btn btn-outline-dark btn-lg">Volver al
        inicio</button>
</body>

</html>