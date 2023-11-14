<?php
include "conectarBBDD.php";

$filas_eliminadas = array();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['eliminar'])) {
    $ids_a_eliminar = $_POST['eliminar'];

    foreach ($ids_a_eliminar as $id) {
        // Obtén los datos de la fila antes de eliminarla
        $query_obtener = "SELECT * FROM viviendas WHERE id_vivienda = $id";
        $resultado_obtener = mysqli_query($conn, $query_obtener);
        $fila_eliminada = mysqli_fetch_assoc($resultado_obtener);

        if ($fila_eliminada !== null) {
            $filas_eliminadas[] = $fila_eliminada;

            // Elimina la fila de la base de datos
            $query_eliminar = "DELETE FROM viviendas WHERE id_vivienda = $id";
            mysqli_query($conn, $query_eliminar);
        }
    }
}

?>

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
    <form action="" method="post">
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
                        <input type="checkbox" name="eliminar[]" value="<?php echo $fila['id_vivienda']; ?>">
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <button type="submit" class="btn btn-outline-dark btn-lg">Eliminar registro</button>
    </form>
    <button onclick="window.location.href='inicio.php'" class="btn btn-outline-dark btn-lg">Volver al
        inicio</button>
</body>

</html>

<?php
// Muestra los datos de las filas eliminadas
if (!empty($filas_eliminadas)) {
    echo "<h2>Filas Eliminadas:</h2>";
    foreach ($filas_eliminadas as $fila_eliminada) {
        echo "<ul>
        <li>Id_vivienda: $fila_eliminada[id_vivienda]</li>

        <li>Tipo: $fila_eliminada[tipo]</li>

        <li>Zona: $fila_eliminada[zona]</li>

        <li>Dirección:$fila_eliminada[direccion]</li>

        <li>Número de dormitorios: $fila_eliminada[num_dormitorios]</li>

        <li>Precio: $fila_eliminada[precio]</li>

        <li>Tamaño: $fila_eliminada[tamano]</li>

        <li>Extras: $fila_eliminada[extras]</li>

        <li>Foto de Vivienda: $fila_eliminada[foto]</li>

        <li>Observaciones: $fila_eliminada[observaciones]</li>
    </ul>";
    }
}
mysqli_close($conn);
?>