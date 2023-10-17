<?php
$_SERVER["REQUEST_METHOD"] == "POST";

function filtrado($datos)
{
    $datos = trim($datos); //Elimina los espacios en blanco por los dos lados
    $datos = stripslashes($datos); //Elimina los \
    $datos = htmlspecialchars($datos); //Traduce caracteres especiales en html

    return $datos;
}

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

    if (empty($errores)) {

        $vivienda = filtrado($_REQUEST['tipoVivienda']);
        $zona = filtrado($_REQUEST['tipoZona']);
        $direccion = filtrado($_REQUEST['dic']);
        $dormitorios = filtrado($_REQUEST['dorm']);
        $precio = filtrado($_REQUEST['precio']);
        $tamaño = filtrado($_REQUEST['tamaño']);
        $extras = filtrado(implode(", ", $_REQUEST['extras']));
        $obs = filtrado($_REQUEST['obs']);

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

    </ul>
    <a style=color: blue href=app.html>[Insertar otra vivienda]</a>";
    } else {
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
    }
}

/*echo error_reporting(0) . "<br>";
echo $_FILES['imagen']['name'] . "<br>";
echo $_FILES['imagen']['tmp_name'] . "<br>";
echo $_FILES['imagen']['type'] . "<br>";
echo $_FILES['imagen']['size'] . "<br>";
echo $_FILES['imagen']['error'] . "<br>";*/

$extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
$max_tamanyo = 1024 * 1024 * 8;
$imagen = $_FILES['imagen']['name'];

$FILE = "c:/xampp/htdocs/entornoServidor/APP/app.php";

$ruta_indexphp = dirname(realpath($FILE));
$ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
$ruta_nuevo_destino = $ruta_indexphp . '/imagenes/' . $_FILES['imagen']['name'];
if (in_array($_FILES['imagen']['type'], $extensiones)) {
    if ($_FILES['imagen']['size'] < $max_tamanyo) {
        if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
        }
    }
}

echo "<img src=imagenes/$imagen />";


?>
