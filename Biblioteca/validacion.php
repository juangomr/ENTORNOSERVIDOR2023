<?php
//Declaro mis constantes
$errores = array();
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

    include "conectarBBDD.php";
    $autor = filtrado($_REQUEST['autor']);
    $descripcion = filtrado($_REQUEST['descripcion']);
    $precio = filtrado($_REQUEST['precio']);
    $editorial = filtrado($_REQUEST['editorial']);
    $fecha = filtrado($_REQUEST['fecha']);
    $genero = filtrado($_REQUEST['genero']);

    $sql = "INSERT INTO libros (autor, descripcion, editorial, fecha_publicacion, genero, imagen, precio) VALUES ('$autor', '$descripcion', '$editorial', '$fecha', '$genero', '$imagen', '$precio')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
            <link href="css/registro.css" rel="stylesheet">
        </head>

        <body>


            <div class="contenedorPedido">

                <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
                    alt="logotipo" />

                <h1>LIBRO INSERTADO CORRECTAMENTE!</h1>


                <button onclick="window.location.href='indexSesionIniciada.php'" class="btn btn-primary btn-lg">
                    Volver a la Biblioteca</button>
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
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
            <link href="css/registro.css" rel="stylesheet">
        </head>

        <body>


            <div class="contenedorPedido">

                <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
                    alt="logotipo" />

                <h1>ERROR EN LA INSERCIÓN DEL LIBRO!</h1>

                <p>Error: </p>
                <?php $sql . "<br>" . mysqli_error($conn); ?>


                <button onclick="window.location.href='insertarLibro.php'" class="btn btn-primary btn-lg">
                    Volver al formulario de Inserción del Libro</button>
            </div>
        </body>

        </html>
        <?php
    }

    //  $imagen = "<a href=$ruta_imagen target=_blank>" . $imagen . "</a>";
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link href="css/registro.css" rel="stylesheet">
    </head>

    <body>


        <div class="contenedorPedido">

            <img src="imagenes/Captura_de_pantalla_2024-01-24_152316-removebg-preview.png" class="card-img-top"
                alt="logotipo" />

            <h1>ERROR EN LA INSERCIÓN DEL LIBRO!</h1>

            <p>Error: </p>
            <?php foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            ?>
            <button onclick="window.location.href='insertarLibro.php'" class="btn btn-primary btn-lg">
                Volver al formulario de Inserción del Libro</button>
        </div>
    </body>

    </html>

    <?php
}


