<?php
include "conectarBBDD.php";
//Paginación. Aquí se calcula el número de resultados por página
// y la fila de inicio.
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$resultadosPorPagina = 10;
$inicioFila = ($paginaActual - 1) * $resultadosPorPagina;

/*Consulta SQL la primera para obtener el número total de
resultados y calcular el número total de páginas, y la segunda
para obtener los resultados paginados según el filtro aplicado.*/
$query = "SELECT * FROM libros";
$resultado = mysqli_query($conn, $query);
$num_resultados_total = mysqli_num_rows($resultado);
$num_paginas_total = ceil($num_resultados_total / $resultadosPorPagina);
//                    $consulta = mysqli_query($conn, "SELECT * FROM libros LIMIT $inicioFila, $resultadosPorPagina");

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca AQUI NO SE LEE NUNCA</title>
    <link href="css/estilos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <nav>
            <ul class="UlMenuTop ">
                <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                <li class="listasMenuTop"><a class="sinBarraVertical" href="index.php">Biblioteca</a></li>

                <li class="push-right"><a class="sinBarraVertical" href="inicioSesion.php">INICIAR SESION</a></li>
                <li class="listasMenuTop"><a class="conBarraVerticalDerecha" href="registro.php">REGISTRARSE</a></li>
                <div class="carro">
                    <img class="carrito" src="imagenes/carrito-removebg-preview.png">
                    <li class="listasMenuTop"><a href="carrito.php" class="sinBarraVertical" data-bs-toggle="modal"
                            data-bs-target="#modal_inicio">CARRITO
                        </a></li>
                </div>
                <div class="buscador">

                    <form id="form2" name="form2" method="POST" action="index.php">
                        <input type="text" placeholder="Buscar libros..." name="buscar1" id="buscar1" />
                        <input type="submit" class="btn btn-outline-light" value="Ver" name="buscar" id="buscar">
                    </form>
                    <img class="lupa" src="imagenes/lupa-removebg-preview.png">
                </div>
            </ul>
        </nav>

    </header>
    <div class="container">
        <div class="libros">

            <h1 <?php echo isset($_POST['buscar1']) ? 'class=ocultar' : 'class=titulo'; ?>>Últimos libros</h1>

            <div <?php echo isset($_POST['buscar1']) ? 'class=ocultar' : 'class=contenedorLibros'; ?>>

                <?php
                $consulta = mysqli_query($conn, "SELECT * FROM libros LIMIT $inicioFila, $resultadosPorPagina");
                if (mysqli_num_rows($consulta) > 0) {
                    while ($resultado = mysqli_fetch_assoc($consulta)) {
                        ?>
                        <div class="cajaLibros ">
                            <p class="nombre">
                                <?php echo $resultado['descripcion']; ?>
                            </p>
                            <img src="imagenes/<?php echo $resultado['imagen']; ?>" alt="" />
                            <p class="autor">
                                <strong>Autor:</strong>
                                <?php echo $resultado['autor']; ?>
                            </p>
                            <p class="descripcion">
                                <strong>Editorial:</strong>
                                <?php echo $resultado['editorial']; ?>
                            </p>
                            <p class="descripcion">
                                <strong> Género literario:</strong>
                                <?php echo $resultado['genero']; ?>
                            </p>
                            <p class="descripcion">
                                <strong>Fecha Publicación:</strong>
                                <?php echo $resultado['fecha_publicacion']; ?>
                            </p>
                            <p class="precio">
                                <?php echo $resultado['precio']; ?>€
                            </p>
                            <form action="" method="post">
                                <input type="number" min="1" name="cantidadLibro" value="1">
                                <input type="hidden" name="imagenLibro" value="<?php echo $resultado['imagen']; ?>">
                                <input type="hidden" name="nombreLibro" value="<?php echo $resultado['descripcion']; ?>">
                                <input type="hidden" name="precioLibro" value="<?php echo $resultado['precio']; ?>">
                                <div class="botones">
                                    <input type="submit" class="btn btn-primary btn-lg" name="agregarCarrito"
                                        data-bs-toggle="modal" data-bs-target="#modal_cart" value="Añadir al carrito">
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>


            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar1'])) {
                $buscar = $_POST['buscar1'];

                $sql = "SELECT * FROM libros WHERE 
                LOWER(autor) LIKE '%" . strtolower($buscar) . "%' OR 
                LOWER(descripcion) LIKE '%" . strtolower($buscar) . "%' OR 
                LOWER(fecha_publicacion) LIKE '%" . strtolower($buscar) . "%' OR 
                LOWER(genero) LIKE '%" . strtolower($buscar) . "%' OR 
                LOWER(editorial) LIKE '%" . strtolower($buscar) . "%'";
                $resultadoConsulta = mysqli_query($conn, "SELECT * FROM libros LIMIT $inicioFila, $resultadosPorPagina");
                $numResultados = mysqli_num_rows($resultadoConsulta);
                ?>
                <h1 style="text-align:center; margin-top: 2rem; margin-bottom: 2rem;"> Número de resultados (
                    <?php echo $numResultados ?> )
                </h1>
                <div class="contenedorLibros">

                    <?php
                    while ($resultado = mysqli_fetch_assoc($resultadoConsulta)) {
                        ?>


                        <div class="cajaLibros">
                            <p class="nombre">
                                <?php echo $resultado['descripcion']; ?>
                            </p>
                            <img src="imagenes/<?php echo $resultado['imagen']; ?>" alt="" />
                            <p class="autor">
                                <strong>Autor:</strong>
                                <?php echo $resultado['autor']; ?>
                            </p>
                            <p class="descripcion">
                                <strong>Editorial:</strong>
                                <?php echo $resultado['editorial']; ?>
                            </p>
                            <p class="descripcion">
                                <strong> Género literario:</strong>
                                <?php echo $resultado['genero']; ?>
                            </p>
                            <p class="descripcion">
                                <strong>Fecha Publicación:</strong>
                                <?php echo $resultado['fecha_publicacion']; ?>
                            </p>
                            <p class="precio">
                                <?php echo $resultado['precio']; ?>€
                            </p>
                            <form action="carrito.php" method="post">
                                <input type="number" min="1" name="cantidadLibro" value="1">
                                <input type="hidden" name="imagenLibro" value="<?php echo $resultado['imagen']; ?>">
                                <input type="hidden" name="nombreLibro" value="<?php echo $resultado['descripcion']; ?>">
                                <input type="hidden" name="precioLibro" value="<?php echo $resultado['precio']; ?>">
                                <div class="botones">
                                    <input data-bs-toggle="modal" data-bs-target="#modal_cart" type="submit"
                                        class="btn btn-primary btn-lg" name="agregarCarrito" value="Añadir al carrito">
                                </div>
                            </form>
                        </div>

                    <?php }

            } ?>


            </div>
        </div>

    </div>
    <!--Modal agregar carrito-->
    <div class="modal fade" id="modal_cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso de compra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Regístrese o inicie sesión si ya tiene una cuenta para poder agregar libros al carrito.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary"
                        onclick="window.location.href='registro.php'">Logueate</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal carrito sin iniciar sesión-->
    <div class="modal fade" id="modal_inicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso de compra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    No puede acceder al carrito sin registrarse o iniciar sesión.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary"
                        onclick="window.location.href='registro.php'">Logueate</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    //Lógica de enlaces de paginación
    if ($paginaActual == 1) {
        $paginaSiguiente = $paginaActual + 1;

        ?>
        <div class="centrar">
            <button onclick="window.location.href='index.php?pagina=<?php echo $paginaSiguiente ?>'"
                class="btn btn-primary btn-lg ">Siguiente</button>
        </div>
        <?php
    }


    if ($paginaActual > 1 && $paginaActual <= $num_paginas_total) {
        $paginaAnterior = $paginaActual - 1;
        $paginaSiguiente = $paginaActual + 1;
        if ($paginaSiguiente) {

            ?>
            <div class="centrar">
                <button onclick="window.location.href='index.php?pagina=<?php echo $paginaAnterior ?>'"
                    class="btn btn-primary btn-lg ">Anterior</button>

                <button onclick="window.location.href='index.php?pagina=<?php echo $paginaSiguiente ?>'"
                    class="btn btn-primary btn-lg ">Siguiente</button>
            </div>
            <?php

        } else {
            ?>
            <div class="centrar">
                <button onclick="window.location.href='index.php?pagina=<?php echo $paginaAnterior ?>'"
                    class="btn btn-primary btn-lg ">Anterior</button>
            </div>
            <?php
        }
    }

    if (
        $paginaActual >
        $num_paginas_total
    ) {
        $paginaAnterior = $paginaActual - 1;
        ?>
        <div class="centrar">
            <button onclick="window.location.href='index.php?pagina=<?php echo $paginaAnterior ?>'"
                class="btn btn-primary btn-lg ">Anterior</button>
            <h3>No se encontraron resultados</h3>
        </div>
        <?php
    } else {
        $paginaAnterior = $paginaActual - 1;
    }
    mysqli_close($conn);
    ?>
</body>