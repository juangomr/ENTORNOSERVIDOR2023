<?php
$minutos = $_POST['minutos'];
if ($minutos < 4) {
    $coste = 10;
    echo $coste;
} else {
    $coste = 10 + (($minutos - 3) * 5);
    echo $coste;
}
?>