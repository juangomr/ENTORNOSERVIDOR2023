<?php
//Conexión a la base de datos.
include "conectarBBDD.php";
$filtro = "";
$respuesta = "";
//Filtrado de viviendas según el tipo seleccionado en el formulario
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_REQUEST["actualizar"])) {
    $respuesta = $_POST['usuario'];
    if ($respuesta != "todos") {
        $filtro = " WHERE tipoUsuario = '$respuesta'";
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
$query = "SELECT * FROM usuario";
$resultado = mysqli_query($conn, $query);
$num_resultados_total = mysqli_num_rows($resultado);
$num_paginas_total = ceil($num_resultados_total / $resultadosPorPagina);

$query = "SELECT * FROM usuario " . $filtro . "LIMIT $inicioFila, $resultadosPorPagina";
$resultado = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar usuarios</title>
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
                        <input type="text" placeholder="Buscar productos..." />
                    </form>
                    <img class="lupa" src="imagenes/lupa-removebg-preview.png">
                </div>
            </ul>
        </nav>

    </header>
    <h1 style="text-align:center; margin-top: 2rem; margin-bottom: 2rem;">Consultar usuarios</h1>
    <!--Formulario de filtrado-->
    <form action="" method="post">
        <label for="usuario">Filtrar por: </label>
        <select name="usuario">
            <option value="todos" <?php if ($respuesta == "todos")
                echo "selected"; ?>>Todos</option>
            <option value="usuario" <?php if ($respuesta == "usuario")
                echo "selected"; ?>>Usuario</option>
            <option value="admin" <?php if ($respuesta == "admin")
                echo "selected"; ?>>Admin</option>


        </select>
        <input class="btn btn-dark" type="submit" value="Actualizar" name="actualizar">
    </form>
    <!--Mostrar los resultados en una tabla-->
    <table>
        <table class="table">
            <thead>
                <tr>
                    <td scope="col">Nombre</td>
                    <td scope="col">Correo</td>
                    <td scope="col">Contraseña</td>
                    <td scope="col">Fecha registro</td>
                    <td scope="col">Dirección</td>
                    <td scope="col">tipoUsuario</td>
                </tr>
            </thead>
            <tbody>

                <?php

                $query = "SELECT * FROM usuario " . $filtro . "LIMIT $inicioFila, $resultadosPorPagina";
                $resultado = mysqli_query($conn, $query);

                while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $fila['nombreUsuario'] ?>
                        </td>
                        <td>
                            <?php echo $fila['correo'] ?>
                        </td>
                        <td>
                            <?php echo $fila['password'] ?>
                        </td>
                        <td>
                            <?php echo $fila['fechaReg'] ?>
                        </td>
                        <td>
                            <?php echo $fila['direccion'] ?>
                        </td>
                        <td>
                            <?php echo $fila['tipoUsuario'] ?>
                        </td>
                        <?php
                }
                ?>
            </tbody>
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
            echo "<a href='?pagina=$paginaAnterior'>[ Anterior ]</a>";
            echo "No se encontraron resultados";

        } else {
            $paginaAnterior = $paginaActual - 1;
        }
        ?>

</body>

</html>