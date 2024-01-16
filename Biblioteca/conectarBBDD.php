<?php
/*Código que se encarga de establecer una conexión a una base de datos
usando la extensión mysqli*/
$user = "root";
$password = "";
$host = "localhost";
$db = "biblioteca";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    echo "Error conectando a la bbdd";
    exit();
}
?>