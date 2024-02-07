<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca AQUI NO SE LEE NUNCA</title>
    <link href="css/estilos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <nav>
            <ul class="UlMenuTop ">
                <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                <li class="listasMenuTop"><a class="sinBarraVertical"
                        href="indexSesionIniciadaUsuario.php">Biblioteca</a></li>


                <?php
                include "conectarBBDD.php";
                session_start(); ?>
                <li class="push-right">Bienvenido,
                    <i class="fa-solid fa-user"></i>
                    <?php echo $_SESSION['nombreUsuario'] ?>
                </li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="cerrarSesion.php">Cerrar Sesión</a></li>
                <div class="carro">
                    <img class="carrito" src="imagenes/carrito-removebg-preview.png">
                    <li class="listasMenuTop"><a class="sinBarraVertical" href="carrito.php">CARRITO
                        </a>
                    </li>
                </div>
                <div class="buscador">
                    <form id="form2" name="form2" method="POST" action="indexSesionIniciadaUsuario.php">
                        <input type="text" placeholder="Buscar libros..." name="buscar1" id="buscar1" />
                        <input type="submit" class="btn btn-outline-light" value="Ver" name="buscar" id="buscar">
                    </form>
                </div>
            </ul>
        </nav>

    </header>
    <div class="container">

        <div class="libros">

            <h1 <?php echo isset($_POST['buscar1']) ? 'class=ocultar' : 'class=titulo'; ?>>Últimos libros</h1>

            <div <?php echo isset($_POST['buscar1']) ? 'class=ocultar' : 'class=contenedorLibros'; ?>>

                <?php
                $consulta = mysqli_query($conn, "SELECT * FROM libros");
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
                            <form action="carrito.php" method="post">
                                <input type="number" min="1" name="cantidadLibro" value="1">
                                <input type="hidden" name="imagenLibro" value="<?php echo $resultado['imagen']; ?>">
                                <input type="hidden" name="nombreLibro" value="<?php echo $resultado['descripcion']; ?>">
                                <input type="hidden" name="precioLibro" value="<?php echo $resultado['precio']; ?>">
                                <div class="botones">
                                    <input type="submit" class="btn btn-primary btn-lg" name="agregarCarrito"
                                        value="Añadir al carrito">
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
                $resultadoConsulta = mysqli_query($conn, $sql);
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
                                    <input type="submit" class="btn btn-primary btn-lg" name="agregarCarrito"
                                        value="Añadir al carrito">
                                </div>
                            </form>
                        </div>

                    <?php }

            } ?>


            </div>
        </div>
    </div>

</body>