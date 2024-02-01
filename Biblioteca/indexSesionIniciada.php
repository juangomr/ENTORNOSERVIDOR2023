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
                <li class="listasMenuTop"><a class="sinBarraVertical" href="indexSesionIniciada.php">Biblioteca</a></li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="insertarLibro.php">Libros</a></li>
                <?php
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
                <li style="color: white; font-weigth: bold;" class="listasMenuTop" id="cant"></li>

                <div class="buscador">
                    <form>
                        <input type="text" placeholder="Buscar productos..." />
                    </form>
                    <img class="lupa" src="imagenes/lupa-removebg-preview.png">
                </div>
            </ul>
        </nav>

    </header>
    <div class="container">
        <div class="libros">

            <h1 class="titulo">Últimos libros</h1>

            <div class="contenedorLibros">

                <?php
                include "conectarBBDD.php";
                $consulta = mysqli_query($conn, "SELECT * FROM libros");
                if (mysqli_num_rows($consulta) > 0) {
                    while ($resultado = mysqli_fetch_assoc($consulta)) {
                        ?>
                        <div method="post" class="cajaLibros" action="">
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
                                <input type="number" min="1" name="product_quantity" value="1">
                                <input type="hidden" name="product_image" value="<?php echo $resultado['imagen']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $resultado['descripcion']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $resultado['precio']; ?>">
                                <div class="botones">
                                    <button class="btn btn-warning btn-sm" name="anadir" id="anadir"
                                        onclick="agregarAlCarrito()">Añadir al Carrito
                                    </button>
                                    <input type="hidden" class="btn btn-primary btn-sm" name="agregarCarrito"
                                        value="Comprar Ahora">
                                    <input type="submit" class="btn btn-primary btn-sm" name="agregarCarrito">

                                    <input type="reset" class="btn btn-danger btn-sm" name="eliminarCarrito"
                                        value="Eliminar del carrito">
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

        </div>

    </div>
    <script>
        function agregarAlCarrito() {
            // Obtener el elemento con el ID "cant"
            let cantidadElemento = document.getElementById('cant');

            // Incrementar la cantidad en 1
            let cantidadActual = parseInt(cantidadElemento.innerText) || 0; // Si no hay número, se establece como 0
            cantidadActual++;
            cantidadElemento.innerHTML = "<p style=margin-bottom:0px;>" + cantidadActual + " Articulo/s en carrito</p>";
        }
    </script>
</body>