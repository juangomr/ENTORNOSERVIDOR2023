<?php
include("conectarBBDD.php");
session_start();

$user_id = $_SESSION['idUsuario'];

if (isset($_POST['agregarCarrito'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `carrito` WHERE nombre = '$product_name' AND idUsuario = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `carrito`(idUsuario, nombre, precio, imagen, cantidad) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
        $message[] = 'product added to cart!';
    }

}
;

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `carrito` SET cantidad = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `carrito` WHERE id = '$remove_id'") or die('query failed');
    header('location:index.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `carrito` WHERE idUsuario = '$user_id'") or die('query failed');
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <li class="listasMenuTop"><a class="sinBarraVertical" href="indexSesionIniciada.php">Biblioteca</a></li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="insertarLibro.php">Libros</a></li>
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
                        <input type="text" placeholder="Buscar productos..." />
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
                    $cart_query = mysqli_query($conn, "SELECT * FROM `carrito` WHERE idUsuario = '$user_id'") or die('query failed');
                    $grand_total = 0;
                    if (mysqli_num_rows($cart_query) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                            ?>
                            <tr>
                                <td><img src="imagenes/<?php echo $fetch_cart['imagen']; ?>" height="100" alt=""></td>
                                <td>
                                    <?php echo $fetch_cart['nombre']; ?>
                                </td>
                                <td>
                                    <?php echo $fetch_cart['precio']; ?>€
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                        <input type="number" min="1" name="cart_quantity"
                                            value="<?php echo $fetch_cart['cantidad']; ?>">
                                        <input type="submit" name="update_cart" value="Actualizar carrito"
                                            class="btn btn-primary ">
                                    </form>
                                </td>
                                <td>
                                    <?php echo $sub_total = ($fetch_cart['precio'] * $fetch_cart['cantidad']); ?>€
                                </td>
                                <td><a href="indexSesionIniciada.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn"
                                        onclick="return confirm('¿Seguro que quiere borrar el producto del carrito??');">Eliminar
                                        libro</a>
                                </td>
                            </tr>
                            <?php
                            $grand_total += $sub_total;
                        }
                    } else {
                        echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                    }
                    ?>
                    <tr class="tablaAbajo">
                        <td colspan="4">Total :</td>
                        <td>
                            <?php echo $grand_total; ?>€
                        </td>
                        <td><a href="indexSesionIniciada.php?delete_all"
                                onclick="return confirm('¿Seguro que quieres borrar todos los productos del carrito?');"
                                class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Eliminar todo</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="botonCarrito">
                <a href="#" class="btn <?php echo ($grand_total > 1) ? '' : 'deshabilitado'; ?>">Proceder al pago</a>
            </div>

        </div>

    </div>
    </div>
</body>

</html>