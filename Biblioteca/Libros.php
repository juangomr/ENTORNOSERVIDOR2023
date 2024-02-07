<?php
include "conectarBBDD.php";

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
    <title>Biblioteca AQUI NO SE LEE NUNCA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <nav>
            <ul class="UlMenuTop ">
                <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                <li class="listasMenuTop"><a class="sinBarraVertical" href="indexSesionIniciadaAdmin.php">Biblioteca</a>
                </li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="Libros.php">Libros</a></li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="usuario.php">Usuarios</a></li>
                <?php
                include "conectarBBDD.php";
                session_start(); ?>
                <li class="push-right">Bienvenido,
                    <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION['nombreAdmin'] ?>
                </li>
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
    <section>
        <h1 style="text-align:center; margin-top: 2rem; margin-bottom: 2rem;">Libros Existentes</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Autor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Fecha publicación</th>
                    <th scope="col">Género literario</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM libros LIMIT $inicioFila, $resultadosPorPagina";
                $resultado = mysqli_query($conn, $query);
                while ($fila = $resultado->fetch_assoc()) {
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

                    </tr>
                    <?php
                }

                ?>
            </tbody>
        </table>
        <div class="centrar">
            <button onclick="window.location.href='insertarLibro.php'" class="btn btn-success btn-lg ">Nuevo
                libro</button>
            <button onclick="window.location.href='eliminarLibro.php'" class="btn btn-danger btn-lg ">Eliminar
                libro</button>
        </div>
    </section>
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

        echo "<a href='?pagina=$paginaAnterior'>[ Anterior ]</a>";
        echo "No se encontraron resultados";

    } else {
        $paginaAnterior = $paginaActual - 1;
    }
    ?>
</body>

</html>