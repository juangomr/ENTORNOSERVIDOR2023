<?php
$user = "root";
$password = "";
$host = "localhost";
$db = "lindavista";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    echo "Error conectando a la bbdd";
    exit();
}
?>