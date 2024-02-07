<?php
include "conectarBBDD.php";

//Procesamiento de la eliminación de registros
$filas_eliminadas = array();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['eliminar'])) {
    $ids_a_eliminar = $_POST['eliminar'];

    foreach ($ids_a_eliminar as $id) {
        // Obtén los datos de la fila antes de eliminarla
        $query_obtener = "SELECT * FROM libros WHERE idLibro = $id";
        $resultado_obtener = mysqli_query($conn, $query_obtener);
        $fila_eliminada = mysqli_fetch_assoc($resultado_obtener);

        if ($fila_eliminada !== null) {
            $filas_eliminadas[] = $fila_eliminada;

            // Elimina la fila de la base de datos
            $query_eliminar = "DELETE FROM libros WHERE idLibro = $id";
            mysqli_query($conn, $query_eliminar);
        }
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
$query = "SELECT * FROM libros";
$resultado = mysqli_query($conn, $query);
$num_resultados_total = mysqli_num_rows($resultado);
$num_paginas_total = ceil($num_resultados_total / $resultadosPorPagina);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <ul class="UlMenuTop ">
                <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                <li class="listasMenuTop"><a class="sinBarraVertical" href="index.php">Biblioteca</a></li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="insertarLibro.php">Libros</a></li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="usuario.php">Usuarios</a></li>

                <li class="push-right"><a class="sinBarraVertical" href="inicioSesion.php">INICIAR SESION</a></li>
                <li class="listasMenuTop"><a class="conBarraVerticalDerecha" href="registro.php">REGISTRARSE</a></li>
                <div class="carro">
                    <img class="carrito" src="imagenes/carrito-removebg-preview.png">
                    <li class="listasMenuTop"><a class="sinBarraVertical" href="#">CARRITO (0)</a></li>
                </div>
                <div class="buscador">
                    <form>
                        <input type="text" placeholder="Buscar libros..." />
                    </form>
                    <img class="lupa" src="imagenes/lupa-removebg-preview.png">
                </div>
            </ul>
        </nav>

    </header>
    <h1 style="text-align:center; margin-top: 2rem; margin-bottom: 2rem;">Eliminar Libros</h1>
    <form action="" method="post">
        <!-- Mostrar tabla con registros y checkboxes para eliminación-->
        <table class="table">
            <thead>
                <tr>
                    <td scope="col">Autor</td>
                    <td scope="col">Nombre</td>
                    <td scope="col">Editorial</td>
                    <td scope="col">Fecha publicación</td>
                    <td scope="col">Género literario</td>
                    <td scope="col">Imagen</td>
                    <td scope="col">Precio</td>
                    <td scope="col">Eliminar</td>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM libros LIMIT $inicioFila, $resultadosPorPagina";
                $resultado = mysqli_query($conn, $query);

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $fila['autor'] ?>
                        </td>
                        <td>
                            <?php echo $fila['descripcion'] ?>
                        </td>
                        <td>
                            <?php echo $fila['editorial'] ?>
                        </td>
                        <td>
                            <?php echo $fila['fecha_publicacion'] ?>
                        </td>
                        <td>
                            <?php echo $fila['genero'] ?>
                        </td>
                        <td>
                            <?php echo $fila['imagen'] ?>
                        </td>
                        <td>
                            <?php echo $fila['precio'] ?>€
                        </td>

                        <td>
                            <input type="checkbox" name="eliminar[]" value="<?php echo $fila['idLibro']; ?>">
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-danger btn-lg">Eliminar registro</button>
        <button type="button" onclick="window.location.href='indexSesionIniciada.php';"
            class="btn btn-primary btn-lg">Volver a Biblioteca
        </button>
    </form>

</body>

</html>

<?php
// Muestra los datos de las filas eliminadas
if (!empty($filas_eliminadas)) {
    echo "<h2>Filas Eliminadas:</h2>";
    foreach ($filas_eliminadas as $fila_eliminada) {
        echo "<ul>
        <li>IdLibro: $fila_eliminada[idLibro]</li>

        <li>Autor: $fila_eliminada[autor]</li>

        <li>Descripción: $fila_eliminada[descripcion]</li>

        <li>Editorial:$fila_eliminada[editorial]</li>

        <li>Fecha Publicación: $fila_eliminada[fecha_publicacion]</li>

        <li>Género: $fila_eliminada[genero]</li>

        <li>Imagen: $fila_eliminada[imagen]</li>

        <li>Precio: $fila_eliminada[precio]</li>

       
    </ul>";
    }
}

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
    echo "<a href='?pagina=$paginaAnterior'>[ Anterior ]</a>";
    echo "No se encontraron resultados";

} else {
    $paginaAnterior = $paginaActual - 1;
}
mysqli_close($conn);
?>