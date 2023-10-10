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

        echo "<h1 style=color: blue;>Inserción de Vivienda</h1>
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

    </ul>";
    } else {
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
    }
}



?>