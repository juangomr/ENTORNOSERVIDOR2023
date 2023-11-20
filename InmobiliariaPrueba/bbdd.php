<?php
//Conexión a la base de datos.
include "conectarBBDD.php";
$filtro = "";
$respuesta = "";
//Filtrado de viviendas según el tipo seleccionado en el formulario
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_REQUEST["actualizar"])) {
    $respuesta = $_POST['vivienda'];
    if ($respuesta != "todos") {
        $filtro = " WHERE tipo = '$respuesta'";
    }
}
//Paginación. Aquí se calcula el número de resultados por página
// y la fila de inicio.
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$resultadosPorPagina = 5;
$inicioFila = ($paginaActual - 1) * $resultadosPorPagina;

/*Consulta SQL la primera para obtener el número total de 
resultados y calcular el número total de páginas, y la segunda 
para obtener los resultados paginados según el filtro aplicado.*/
$query = "SELECT * FROM viviendas";
$resultado = mysqli_query($conn, $query);
$num_resultados_total = mysqli_num_rows($resultado);
$num_paginas_total = ceil($num_resultados_total / $resultadosPorPagina);

$query = "SELECT * FROM viviendas " . $filtro . "LIMIT $inicioFila, $resultadosPorPagina";
$resultado = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar viviendas BBDD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/bbdd.css" rel="stylesheet">
</head>

<body>
    <h1>Consultar viviendas</h1>
    <!--Formulario de filtrado-->
    <form action="bbdd.php" method="post">
        <label for="vivienda">Filtrar por: </label>
        <select name="vivienda">
            <option value="todos" <?php if ($respuesta == "todos")
                echo "selected"; ?>>Todos</option>
            <option value="piso" <?php if ($respuesta == "piso")
                echo "selected"; ?>>Piso</option>
            <option value="adosado" <?php if ($respuesta == "adosado")
                echo "selected"; ?>>Adosado</option>
            <option value="chalet" <?php if ($respuesta == "chalet")
                echo "selected"; ?>>Chalet</option>
            <option value="casa" <?php if ($respuesta == "casa")
                echo "selected"; ?>>Casa</option>

        </select>
        <input type="submit" value="Actualizar" name="actualizar">
    </form>
    <!--Mostrar los resultados en una tabla-->
    <table>
        <?php
        if ($resultado->num_rows > 0) {
            echo " <tr class=primera-fila>
            <td>Tipo</td>
            <td>Zona</td>
            <td>Dirección</td>
            <td>Nº Dormitorios</td>
            <td>Precio</td>
            <td>Tamaño</td>
            <td>Extras</td>
            <td>Imágenes de la vivienda</td>
            <td>Observaciones</td>
        </tr>
        <tr> ";

            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
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

                </tr>
                <?php
            }
            ?>
        </table>

        <?php
        //Lógica de enlaces de paginación
        if ($paginaActual == 1) {
            $paginaSiguiente = $paginaActual + 1;
            echo "<a href='?pagina=$paginaSiguiente'>[ Siguiente ]</a>";
        }

        if ($paginaActual > 1 && $paginaActual <= $num_paginas_total) {
            $paginaAnterior = $paginaActual - 1;
            $paginaSiguiente = $paginaActual + 1;

            if ($paginaSiguiente) {

                echo "<a href='?pagina=$paginaAnterior'>[ Anterior ]</a>";
                echo "<a href='?pagina=$paginaSiguiente'>[ Siguiente ]</a>";
            } else {
                echo "<a href='?pagina=$paginaAnterior'>[ Anterior ]</a>";
            }
        }

        if ($paginaActual > $num_paginas_total) {
            $paginaAnterior = $paginaActual - 1;
            echo "No se encontraron resultados" . "<br>";
            echo "<a href='?pagina=$paginaAnterior'>[ Anterior ]</a>";
        }
        } else {
            $paginaAnterior = $paginaActual - 1;
            echo "No se encontraron resultados" . "<br>";
        }
        ?>
    <!--Botón para volver a la página principal-->
    <button onclick="window.location.href='inicio.php'" class="btn btn-outline-dark btn-lg">
        Volver al inicio</button>
</body>

</html>