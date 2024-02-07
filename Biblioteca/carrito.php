<?php
include("conectarBBDD.php");
session_start();

$idUsuario = $_SESSION['idUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
if (isset($_POST['agregarCarrito'])) {

    $nombreLibro = $_POST['nombreLibro'];
    $precioLibro = $_POST['precioLibro'];
    $imagenLibro = $_POST['imagenLibro'];
    $cantidadLibro = $_POST['cantidadLibro'];
    $fechaPedido = date("Y-m-d");
    $query = mysqli_query($conn, "SELECT * FROM `carrito` WHERE nombre = '$nombreLibro' AND idUsuario = '$idUsuario'") or die('query failed');

    if (mysqli_num_rows($query) > 0) {
    } else {
        mysqli_query($conn, "INSERT INTO `carrito`(idUsuario, nombre, precio, imagen, cantidad, fechaPedido) VALUES('$idUsuario', '$nombreLibro', '$precioLibro', '$imagenLibro', '$cantidadLibro', '$fechaPedido')") or die('query failed');
    }

}
;

if (isset($_POST['actualizarCarrito'])) {
    $cantidadLibro = $_POST['cantidadLibro'];
    $carritoId = $_POST['carritoId'];
    mysqli_query($conn, "UPDATE `carrito` SET cantidad = '$cantidadLibro' WHERE id = '$carritoId'") or die('query failed');
}

if (isset($_POST['eliminarLibro'])) {
    $carritoId = $_POST['carritoId'];
    mysqli_query($conn, "DELETE FROM `carrito` WHERE id = '$carritoId'") or die('query failed');
}

if (isset($_POST['eliminarTodo'])) {
    mysqli_query($conn, "DELETE FROM `carrito` WHERE idUsuario = '$idUsuario'") or die('query failed');
}

if ($tipoUsuario == "Admin") {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito Admin</title>
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
                <ul class="UlMenuTop">
                    <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                    <li class="listasMenuTop"><a class="sinBarraVertical" href="indexSesionIniciadaAdmin.php">Biblioteca</a>
                    </li>
                    <li class="listasMenuTop"><a class="enlacesMenuTop" href="Libros.php">Libros</a></li>
                    <li class="listasMenuTop"><a class="enlacesMenuTop" href="usuario.php">Usuarios</a></li>

                    <li class="push-right">Bienvenido,
                        <i class="fa-solid fa-user"></i>
                        <?php echo $_SESSION['nombreAdmin'] ?>
                    </li>
                    <li class="listasMenuTop"><a class="enlacesMenuTop" href="cerrarSesion.php">Cerrar Sesión</a></li>
                    <div class="carro">
                        <img class="carrito" src="imagenes/carrito-removebg-preview.png">
                        <li class="listasMenuTop"><a class="sinBarraVertical" href="carrito.php">CARRITO</a></li>

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
        <div class="container">
            <div class="carrito">

                <h1 class="titulo">Carrito</h1>

                <table>
                    <thead>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM `carrito` WHERE idUsuario = '$idUsuario'") or die('query failed');
                        $total = 0;
                        if (mysqli_num_rows($sql) > 0) {
                            while ($resultado = mysqli_fetch_assoc($sql)) {
                                ?>
                                <tr>
                                    <td><img src="imagenes/<?php echo $resultado['imagen']; ?>" height="100" alt=""></td>
                                    <td>
                                        <?php echo $resultado['nombre']; ?>
                                    </td>
                                    <td>
                                        <?php echo $resultado['precio']; ?>€
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="carritoId" value="<?php echo $resultado['id']; ?>">
                                            <input type="number" min="1" name="cantidadLibro"
                                                value="<?php echo $resultado['cantidad']; ?>">
                                            <input type="submit" name="actualizarCarrito" value="Actualizar carrito"
                                                class="btn btn-primary ">
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo $sub_total = ($resultado['precio'] * $resultado['cantidad']); ?>€
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="carritoId" value="<?php echo $resultado['id']; ?>">
                                            <input type="submit" name="eliminarLibro" value="Borrar libro" class="btn btn-danger"
                                                onclick="return confirm('¿Seguro que quiere borrar el producto del carrito?');">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $total += $sub_total;
                            }
                        } else {
                            echo '<tr><td style="padding:20px; font-weight:bold; text-transform:capitalize;" colspan="6">NINGÚN LIBRO EN EL CARRITO</td></tr>';
                        }
                        ?>
                        <tr class="tablaAbajo">
                            <td colspan="4">Total :</td>
                            <td>
                                <?php echo $total; ?>€
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="carritoId" value="<?php echo $resultado['id']; ?>">
                                    <input type="submit" name="eliminarTodo" value="Eliminar todo" class="btn btn-warning"
                                        onclick="return confirm('¿Seguro que quiere borrar todos los libros del carrito?');"
                                        <?php echo ($total > 1) ? '' : 'disabled'; ?>>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="botonCarrito">

                    <button onclick="window.location.href='indexSesionIniciadaAdmin.php'" class="
                    btn btn-primary">
                        Seguir comprando</button>

                    <button onclick="window.location.href='tramitarPedido.php'"
                        class="btn btn-success <?php echo ($total > 1) ? '' : 'deshabilitado'; ?>">
                        Proceder al pago</button>
                </div>

            </div>

        </div>
        </div>
    </body>

    </html>

    <?php

} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito Admin</title>
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
                <ul class="UlMenuTop">
                    <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                    <li class="listasMenuTop"><a class="sinBarraVertical"
                            href="indexSesionIniciadaUsuario.php">Biblioteca</a></li>


                    <li class="push-right">Bienvenido,
                        <i class="fa-solid fa-user"></i>
                        <?php echo $_SESSION['nombreUsuario'] ?>
                    </li>
                    <li class="listasMenuTop"><a class="enlacesMenuTop" href="cerrarSesion.php">Cerrar Sesión</a></li>
                    <div class="carro">
                        <img class="carrito" src="imagenes/carrito-removebg-preview.png">
                        <li class="listasMenuTop"><a class="sinBarraVertical" href="carrito.php">CARRITO</a></li>

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
        <div class="container">
            <div class="carrito">

                <h1 class="titulo">Carrito</h1>

                <table>
                    <thead>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM `carrito` WHERE idUsuario = '$idUsuario'") or die('query failed');
                        $total = 0;
                        if (mysqli_num_rows($sql) > 0) {
                            while ($resultado = mysqli_fetch_assoc($sql)) {
                                ?>
                                <tr>
                                    <td><img src="imagenes/<?php echo $resultado['imagen']; ?>" height="100" alt=""></td>
                                    <td>
                                        <?php echo $resultado['nombre']; ?>
                                    </td>
                                    <td>
                                        <?php echo $resultado['precio']; ?>€
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="carritoId" value="<?php echo $resultado['id']; ?>">
                                            <input type="number" min="1" name="cantidadLibro"
                                                value="<?php echo $resultado['cantidad']; ?>">
                                            <input type="submit" name="actualizarCarrito" value="Actualizar carrito"
                                                class="btn btn-primary ">
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo $sub_total = ($resultado['precio'] * $resultado['cantidad']); ?>€
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="carritoId" value="<?php echo $resultado['id']; ?>">
                                            <input type="submit" name="eliminarLibro" value="Borrar libro" class="btn btn-danger"
                                                onclick="return confirm('¿Seguro que quiere borrar el producto del carrito?');">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $total += $sub_total;
                            }
                        } else {
                            echo '<tr><td style="padding:20px; font-weight:bold; text-transform:capitalize;" colspan="6">NINGÚN LIBRO EN EL CARRITO</td></tr>';
                        }
                        ?>
                        <tr class="tablaAbajo">
                            <td colspan="4">Total :</td>
                            <td>
                                <?php echo $total; ?>€
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="carritoId" value="<?php echo $resultado['id']; ?>">
                                    <input type="submit" name="eliminarTodo" value="Eliminar todo" class="btn btn-warning"
                                        onclick="return confirm('¿Seguro que quiere borrar todos los libros del carrito?');"
                                        <?php echo ($total > 1) ? '' : 'disabled'; ?>>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="botonCarrito">

                    <button onclick="window.location.href='indexSesionIniciadaUsuario.php'" class="
                    btn btn-primary">
                        Seguir comprando</button>

                    <button onclick="window.location.href='tramitarPedido.php'"
                        class="btn btn-success <?php echo ($total > 1) ? '' : 'deshabilitado'; ?>">
                        Proceder al pago</button>
                </div>

            </div>

        </div>
        </div>
    </body>

    </html>

<?php } ?>