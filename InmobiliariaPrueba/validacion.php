<?php

//Declaro mis constantes
const EXTENSIONES = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
const MAX_TAMANYO = 1024 * 1024 * 8;


$imagen = str_replace(" ", "-", $_FILES['imagen']['name']);
$FILE = "c:/xampp/htdocs/entornoServidor/InmobiliariaPrueba/validacion.php";
$ruta_imagen = "http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/" . $imagen;
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

    if (empty($_REQUEST['dic'])) {
        $errores[] = "El campo dirección está vacío";
    }
    if (empty($_REQUEST['precio'])) {
        $errores[] = "El campo precio está vacío";
    }
    if (empty($_REQUEST['tamaño'])) {
        $errores[] = "El campo tamaño está vacío";
    }
    if (!is_numeric($_REQUEST['precio'])) {
        $errores[] = "El campo precio sólo admite valores numericos";
    }
    if (!is_numeric($_REQUEST['tamaño'])) {
        $errores[] = "El campo tamaño sólo admite valores numericos";
    }

    if (empty($_REQUEST['extras'])) {
        $errores[] = "El campo extras está vacío";
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

    $vivienda = filtrado($_REQUEST['tipoVivienda']);
    $zona = filtrado($_REQUEST['tipoZona']);
    $direccion = filtrado($_REQUEST['dic']);
    $dormitorios = filtrado($_REQUEST['dorm']);
    $precio = filtrado($_REQUEST['precio']);
    $tamaño = filtrado($_REQUEST['tamaño']);
    $extras = filtrado(implode(", ", $_REQUEST['extras']));
    $obs = filtrado($_REQUEST['obs']);
    $imagen = "<a href=$ruta_imagen target=_blank>" . $imagen . "</a>";

    echo "<h1 style= color:blue>Inserción de Vivienda</h1>
      <p>Estos son los datos introducidos:</p>

  <ul>
      <li>Tipo: $vivienda </li>

      <li>Zona: $zona</li>

      <li>Dirección: $direccion</li>

      <li>Número de dormitorios: $dormitorios</li>

      <li>Precio: $precio</li>

      <li>Tamaño: $tamaño </li>

      <li>Extras: $extras</li>

      <li>Observaciones: $obs </li>

      <li>Foto de Vivienda: <a href=$ruta_imagen target=_blank>$imagen</a></li>
  </ul>

  <a href=inicio.php>[Insertar otra vivienda]</a>";

    include "conectarBBDD.php";
    $sql = "INSERT INTO viviendas (tipo, zona, direccion, num_dormitorios, precio, tamano, extras, foto, observaciones) VALUES ('$vivienda', '$zona', '$direccion', '$dormitorios', '$precio', '$tamaño', '$extras', '$imagen', '$obs')";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

} else {
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
}

?>