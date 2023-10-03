<?php
$_SERVER["REQUEST_METHOD"] == "POST";
if (isset($_POST['segundos'])) {
    $segundos = $_POST['segundos'];
    $horas = floor($segundos / 3600);
    $minutos = floor(($segundos - ($horas * 3600)) / 60);
    $segundos = $segundos - ($horas * 3600) - ($minutos * 60);
    echo $horas . ":" . $minutos . ":" . $segundos;
}
?>