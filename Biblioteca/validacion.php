<?php
//Declaro mis constantes
const EXTENSIONES = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
const MAX_TAMANYO = 1024 * 1024 * 8;

$imagen = str_replace(" ", "-", $_FILES['imagen']['name']);
$FILE = "c:/xampp/htdocs/entornoServidor/Biblioteca/validacion.php";
$ruta_imagen = "http://localhost/entornoServidor/Biblioteca/imagenes/" . $imagen;
$ruta_indexphp = dirname(realpath($FILE));
$ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
$ruta_nuevo_destino = $ruta_indexphp .
    '/imagenes/' . $imagen;
move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino);



//Función que uso para filtrar los datos introducidos en el formulario
function filtrado($datos)
{
    $datos = trim($datos); //Elimina los espacios en blanco por los dos lados
    $datos = stripslashes($datos); //Elimina los \
    $datos = htmlspecialchars($datos); //Traduce caracteres especiales en html
    return $datos;
}

/*Bloque de código donde voy comprobando que se introducen los datos correctos en 
los campos dirección, precio, tamaño e imagen.*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['insertar'])) {

    if (empty($_REQUEST['autor'])) {
        $errores[] = "El campo autor está vacío";
    }
    if (empty($_REQUEST['descripcion'])) {
        $errores[] = "El campo descripcion está vacío";
    }
    if (empty($_REQUEST['precio']) || $_REQUEST['precio'] <= 0) {
        $errores[] = "El campo precio está vacío o es menor a 0";
    }
    if (!is_numeric($_REQUEST['precio'])) {
        $errores[] = "El campo precio sólo admite valores numericos";
    }
    if (empty($_REQUEST['editorial'])) {
        $errores[] = "El campo editorial está vacío";
    }

    if (empty($_REQUEST['fecha'])) {
        $errores[] = "El campo fecha está vacío";
    }

    if (empty($_REQUEST['genero'])) {
        $errores[] = "El campo genero está vacío";
    }

    if (empty($imagen)) {
        $errores[] = "El campo imagen está vacío";
    } else {
        if (!in_array($_FILES['imagen']['type'], EXTENSIONES)) {
            $errores[] = "La extensión de la imagen subida no es correcta";
            if ($_FILES['imagen']['size'] > MAX_TAMANYO) {
                $errores[] = "El tamaño de la imagen subida es mayor de lo permitido";
                if (!move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    $errores[] = "La imagen no se ha movido a la carpeta correspondiente";
                }
            }
        }
    }
}

/*Bloque de código que comprueba si el array de errores está vacío, si es así,
 voy filtrando todos los datos introducidos en el */
if (empty($errores)) {

    $autor = filtrado($_REQUEST['autor']);
    $descripcion = filtrado($_REQUEST['descripcion']);
    $precio = filtrado($_REQUEST['precio']);
    $editorial = filtrado($_REQUEST['editorial']);
    $fecha = filtrado($_REQUEST['fecha']);
    $genero = filtrado($_REQUEST['genero']);
    $imagen = "<a href=$ruta_imagen target=_blank>" . $imagen . "</a>";


    include "conectarBBDD.php";
    $sql = "INSERT INTO libros (autor, descripcion, editorial, fecha_publicacion, genero, imagen, precio) VALUES ('$autor', '$descripcion', '$editorial', '$fecha', '$genero', '$imagen', '$precio')";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

} else {
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo '<a href="insertar.php">Volver al formulario de inserción</a>';
}
include "conectarBBDD.php";

$query = "SELECT * FROM libros";
$resultado = mysqli_query($conn, $query);
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

</head>

<body>
    <header>
        <nav>
            <ul class="UlMenuTop ">
                <img class="logo" src="imagenes/logoBiblioteca-removebg-preview.png">
                <li class="listasMenuTop"><a class="sinBarraVertical" href="#">Biblioteca</a></li>
                <li class="listasMenuTop"><a class="enlacesMenuTop" href="insertarLibro.php">Libros</a></li>
                <li class="push-right"><a class="sinBarraVertical" href="#">INICIAR SESION</a></li>
                <li class="listasMenuTop"><a class="conBarraVerticalDerecha" href="#">REGISTRARSE</a></li>
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
    <section>
        <h1>Libros Existentes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Autor</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Fecha publicación</th>
                    <th scope="col">Género literario</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
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


                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <button onclick="window.location.href='insertarLibro.php'" class="btn btn-success btn-lg">Nuevo
            libro</button>
    </section>
</body>

</html>