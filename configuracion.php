<?php
function conexion()
{
    $mysqli_connect = new mysqli("localhost", "root", "", "usuarios");

    if ($mysqli_connect->connect_error) {
        echo "Error al conectarse: " . $mysqli_connect->connect_error;
        exit;
    }
    return $mysqli_connect;
}
?>
