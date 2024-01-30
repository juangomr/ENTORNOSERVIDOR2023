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
                <li class="listasMenuTop"><a class="sinBarraVertical" href="#">Biblioteca</a></li>
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
                    <li class="listasMenuTop"><a class="sinBarraVertical" href="carrito.php">CARRITO (0)</a></li>
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
    <div class="container">
        <div class="products">

            <h1 class="heading">Últimos libros</h1>

            <div class="box-container">

                <?php
                include "conectarBBDD.php";
                $consulta = mysqli_query($conn, "SELECT * FROM libros");
                if (mysqli_num_rows($consulta) > 0) {
                    while ($resultado = mysqli_fetch_assoc($consulta)) {
                        ?>
                        <form method="post" class="box" action="carrito.php">
                            <p class="name">
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
                            <p class="price">

                                <?php echo $resultado['precio']; ?>€
                            </p>
                            <input type="number" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_image" value="<?php echo $resultado['imagen']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $resultado['descripcion']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $resultado['precio']; ?>">
                            <div class="botones">
                                <input type="submit" class="btn btn-primary" name="agregarCarrito" value="Agregar al carrito">
                                <input type="submit" class="btn btn-danger" name="eliminarCarrito" value="Eliminar del carrito">

                            </div>
                        </form>
                        <?php
                    }
                }
                ?>
            </div>

        </div>

    </div>

</body>